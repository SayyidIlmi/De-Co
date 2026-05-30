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
    public function index()
    {
        // Sengaja tidak me-load 'timelines' atau 'materials' untuk menghemat bandwidth dashboard
        // Cukup ambil info esensial penanda kartu rapat
        $rapat = Rapat::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status'  => 'success',
            'message' => 'Data kartu rapat untuk dashboard berhasil dimuat.',
            'data'    => $rapat
        ], 200);
    }

    /**
     * 2. SHOW: Melihat detail mendalam JIKA user terundang atau seorang Koordinator
     * URL: GET /api/rapat/{id}
     */
    public function show($id)
    {
        $userAktif = Auth::user();

        // 2. PROTEKSI AWAL: Jika token tidak terbaca/salah gerbang, langsung potong di sini
        if (!$userAktif) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Unauthenticated. Sesi token Bearer Anda tidak valid atau tidak disertakan.'
            ], 401);
        }

        // 3. Cari data rapat beserta relasi undangannya
        $rapat = Rapat::with('undanganAnggota:id,username,email')->find($id);

        if (!$rapat) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Data rapat tidak ditemukan.'
            ], 404);
        }

        // 4. Validasi daftar undangan fungsionaris
        $apakahTerundang = $rapat->undanganAnggota->contains($userAktif->id);

        // 5. Gerbang Hak Akses Role
        if ($userAktif->role !== 'koordinator' && !$apakahTerundang) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Akses ditolak. Anda tidak diundang ke dalam rapat internal ini.'
            ], 403);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Detail data rapat internal berhasil ditemukan.',
            'data'    => $rapat
        ], 200);
    }

    /**
     * 3. STORE: Membuat rapat dan mendaftarkan banyak ID Anggota sekaligus
     * URL: POST /api/rapat
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rapat'               => 'required|string|max:255',
            'location'                 => 'required|string|max:255',
            'tgl_mulai'                => 'required|date',
            'tgl_selesai'              => 'required|date|after_or_equal:tgl_mulai',
            'agenda'                   => 'required|string',
            'notulensi'                => 'required|string',
            'penanggung_jawab'         => 'required|string|max:255',
            'undangan_user_id'         => 'required|array|min:1', // Validasi input form kumpulan ID user
            'undangan_user_id.*'       => 'exists:users,id'       // Pastikan ID-nya benar-benar ada di tabel users
        ]);

        DB::beginTransaction();

        try {
            // A. Simpan data induk rapat
            $rapat = Rapat::create([
                'judul'            => $request->nama_rapat,
                'location'         => $request->location,
                'tgl_mulai'        => $request->tgl_mulai,
                'tgl_selesai'      => $request->tgl_selesai,
                'agenda'           => $request->agenda,
                'notulensi'        => $request->notulensi,
                'penanggung_jawab' => $request->penanggung_jawab,
                'token_presensi'   => strtoupper(Str::random(6)),
            ]);


            // C. Masukkan semua user_id terundang ke tabel pivot (rapat_fungsionaris)
            // Cukup lempar array ID [2, 5, 8], Laravel otomatis mengurus penulisan foreign key-nya
            $rapat->undanganAnggota()->attach($request->undangan_user_id);

            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => 'Rapat internal berhasil dibuat dan anggota terpilih telah diundang.',
                'data'    => $rapat->load(['undanganAnggota:id,username'])
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status'       => 'error',
                'message'      => 'Gagal memproses pembuatan rapat.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }
}