<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RapatController extends Controller
{
    /**
     * 1. INDEX: Mengambil data ringan untuk keperluan Rapat Card di Dashboard
     * URL: GET /api/rapat
     */
    public function index(Request $request)
    {
        $query = Rapat::query(); 
        // Server-Side Search
        if ($request->has('search') && $request->search != '') {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('agenda', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('penanggung_jawab', 'LIKE', '%' . $keyword . '%');
                $q->orWhereHas('undanganAnggota', function($userQuery) use ($keyword) {
                $userQuery->where('username', 'LIKE', '%' . $keyword . '%');
            });
            });
        }
        $rapat = $query->orderBy('created_at', 'desc')->paginate(3);
        $rapat->appends(['search' => $request->search]);
        return view('katalograpat', [
            'semua_rapat' => $rapat
        ]);


    }

    /**
     * 2. SHOW: Melihat detail mendalam JIKA user terundang atau seorang Koordinator
     * URL: GET /api/rapat/{id}
     */
    //    public function show($id)
//     {
//         $userAktif = Auth::user();

    //         // 1. PROTEKSI AWAL: Jika user belum login / session habis
//         if (!$userAktif) {
//             return response()->json([
//                 'status'  => 'error',
//                 'message' => 'Unauthenticated. Sesi Anda tidak valid atau tidak disertakan.'
//             ], 401);
//         }

    //         // 2. Cari data rapat (Bisa load undanganAnggota hanya untuk info siapa saja yang ikut)
//         $rapat = Rapat::with('undanganAnggota:id,username,email')->find($id);

    //         if (!$rapat) {
//             return response()->json([
//                 'status'  => 'error',
//                 'message' => 'Data rapat tidak ditemukan.'
//             ], 404);
//         }

    //         // 3. Langsung kembalikan data sukses tanpa ada pengecekan role atau check diundang
//         return response()->json([
//             'status'  => 'success',
//             'message' => 'Detail data rapat berhasil ditemukan.',
//             'data'    => $rapat
//         ], 200);
//     }

    /**
     * 3. STORE: Membuat rapat dan mendaftarkan banyak ID Anggota sekaligus
     * URL: POST /api/rapat
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rapat' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'agenda' => 'required|string',
            'notulensi' => 'required|string',
            'penanggung_jawab' => 'required|string|max:255',
            'undangan_user_id' => 'required|array|min:1', // Validasi input form kumpulan ID user
            'undangan_user_id.*' => 'exists:users,id'       // Pastikan ID-nya benar-benar ada di tabel users
        ]);

        DB::beginTransaction();

        try {
            // A. Simpan data induk rapat
            $rapat = Rapat::create([
                'judul' => $request->nama_rapat,
                'location' => $request->location,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_mulai,
                'agenda' => $request->agenda,
                'notulensi' => $request->notulensi,
                'penanggung_jawab' => $request->penanggung_jawab,
                'token_presensi' => strtoupper(Str::random(6)),
            ]);


            // C. Masukkan semua user_id terundang ke tabel pivot (rapat_fungsionaris)
            // Cukup lempar array ID [2, 5, 8], Laravel otomatis mengurus penulisan foreign key-nya
            $rapat->undanganAnggota()->attach($request->undangan_user_id);

            DB::commit();

            return redirect('/rapat')->with('success', 'Rapat baru berhasil disimpan!');

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memproses pembuatan rapat.',
                'error_detail' => $e->getMessage()
            ], 500);
        }

    }
}