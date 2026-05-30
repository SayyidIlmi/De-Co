<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * METHOD FOR KOORDINATOR (Flowchart: Membuat/Update Token Rapat)
     * Hak Akses: Koordinator Only
     */
    public function index()
    {
        $events = Event::with(['timelines', 'materials', 'documentations'])
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $events
        ], 200);
    }

    public function show($id)
    {

        $event = Event::with(['timelines', 'materials', 'documentations'])->find($id);

        if (!$event) {
            return response()->json([
                'status' => 'error',
                'message' => 'Event dengan ID tersebut tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail event berhasil dimuat.',
            'data' => $event
        ], 200);
    }
    
    public function store(Request $request)
{
    // 1. Validasi seluruh data masuk secara ketat
    $request->validate([
        'event_name'               => 'required|string|max:255',
        'location'                 => 'required|string|max:255',
        'deskripsi'                => 'nullable|string',
        'banner'                   => 'required|file|image|mimes:png,jpeg,jpg|max:5120', // Maksimal gambar 5MB
        'penanggung_jawab'         => 'required|string|max:255',       
        // Validasi struktur array timeline
        'timeline'                 => 'required|array|min:1',
        'timeline.*.tanggal_event' => 'required|date_format:Y-m-d',
        'timeline.*.agenda'        => 'required|string|max:255',
    ]);

    // 2. Inisialisasi variabel path banner kosong
    $bannerPath = null;

    // 3. Proses penyimpanan berkas fisik Banner ke Storage
    if ($request->hasFile('banner')) {
        $bannerFile = $request->file('banner');
        // File disimpan ke folder: storage/app/public/banners
        $bannerPath = $bannerFile->store('banners', 'public');
    }

    // 4. Menggunakan Database Transaction demi keamanan data inter-tabel
    DB::beginTransaction();

    try {
        // Langkah A: Amankan data induk event ke tabel 'events'
        $event = Event::create([
            'judul'            => $request->event_name,
            'location'         => $request->location,
            'deskripsi'        => $request->deskripsi,
            'file_path'        => $bannerPath, // Menyimpan path biner dari folder banners/
            'penanggung_jawab' => $request->penanggung_jawab,
            'token_presensi'   => strtoupper(Str::random(6)), // Token acak 6 karakter
        ]);

        // Langkah B: Simpan baris agenda timeline yang terikat dengan ID Event baru
        foreach ($request->timeline as $item) {
            $event->timelines()->create([
                'tanggal_event' => $item['tanggal_event'],
                'agenda'        => $item['agenda'],
            ]);
        }

        // Jika semua langkah aman, kunci perubahan di database
        DB::commit();

        return response()->json([
            'status'  => 'success',
            'message' => 'Event baru beserta berkas banner berhasil diterbitkan!',
            'data'    => $event->load('timelines')
        ], 201);

    } catch (\Exception $e) {
        // Jika ada baris timeline yang gagal masuk, batalkan seluruh rangkaian pembuatan event
        DB::rollBack();

        return response()->json([
            'status'       => 'error',
            'message'      => 'Gagal menyimpan data event ke sistem.',
            'error_detail' => $e->getMessage()
        ], 500);
    }
}

    public function daftarEvent(Request $request)
{
    if (!request()->wantsJson()) {
        request()->headers->set('Accept', 'application/json');
    }
    // 1. Validasi dasar: ID Event wajib ada dan valid
    $request->validate([
        'event_id' => 'required|exists:events,id'
    ]);
    $event = Event::find($request->event_id);
    // 2. CEK STATUS: Apakah request membawa Token Auth Staff/Admin yang valid?
    $userAktif = Auth::guard('sanctum')->user();
    if ($userAktif) {
        // ====================================================
        // JALUR SKENARIO A: PENDAFTAR ADALAH STAFF INTERNAL
        // ====================================================
        // Validasi: Apakah staff ini sudah pernah mengklik daftar di event ini?
        $sudahDaftar = DB::table('event_user')
                         ->where('event_id', $event->id)
                         ->where('user_id', $userAktif->id)
                         ->exists();
        if ($sudahDaftar) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Staff ' . $userAktif->username . ' sudah terdaftar di event ini.'
            ], 422);
        }
        // Simpan data murni mengambil dari objek User (Tanpa mengisi form identitas)
        $event->pendaftar()->attach($userAktif->id);
        return response()->json([
            'status'  => 'success',
            'message' => 'Pendaftaran sukses! Menggunakan data akun internal Staff DPM.',
            'pendaftar' => [
                'tipe'     => 'Internal Staff',
                'username' => $userAktif->username,
                'role'     => $userAktif->role
            ]
        ], 201);
    } else {
        // ====================================================
        // JALUR SKENARIO B: PENDAFTAR ADALAH MASYARAKAT UMUM
        // ====================================================
        // Karena umum/guest, jalankan validasi form identitas secara ketat
        $request->validate([
            'nama_lengkap'     => 'required|string|max:255',
            'nim'              => 'required|string|max:50',
            'fakultas_jurusan' => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'no_wa'            => 'required|string|max:20',
            'alasan_mengikuti' => 'required|string',
        ]);

        // Validasi: Mencegah Duplikasi Peserta Umum berdasarkan NIM pada event yang sama
        $nimSudahDaftar = DB::table('event_user')
                            ->where('event_id', $event->id)
                            ->where('nim', $request->nim)
                            ->exists();

        if ($nimSudahDaftar) {
            return response()->json([
                'status'  => 'error',
                'message' => 'NIM ' . $request->nim . ' sudah terdaftar sebagai peserta di event ini.'
            ], 422);
        }

        // Tulis data tamu umum langsung ke dalam tabel pivot
        DB::table('event_user')->insert([
            'event_id'         => $event->id,
            'user_id'          => null, // Sengaja dikosongkan karena tidak punya akun fungsionaris
            'nama_lengkap'     => $request->nama_lengkap,
            'nim'              => $request->nim,
            'fakultas_jurusan' => $request->fakultas_jurusan,
            'email'            => $request->email,
            'no_wa'            => $request->no_wa,
            'alasan_mengikuti' => $request->alasan_mengikuti,
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Pendaftaran sukses! Data identitas umum berhasil disimpan ke list peserta.',
            'pendaftar' => [
                'tipe' => 'Masyarakat Umum / Mahasiswa Luar',
                'nama' => $request->nama_lengkap,
                'nim'  => $request->nim
            ]
        ], 201);
    }
}
public function uploadMaterial(Request $request, $id)
    {
        // 1. Validasi pastikan induk event-nya ada
        $event = Event::find($id);
        if (!$event) {
            return redirect()->back()->with('error', 'Data event tidak ditemukan.');
        }

        // 2. Validasi file materi yang di-drop (Maksimal berkas 5MB)
        $request->validate([
            'material_file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg|max:5120',
        ]);

        if ($request->hasFile('material_file')) {
            $file = $request->file('material_file');
            
            // Simpan berkas fisik ke folder: storage/app/public/event_materials
            $path = $file->store('event_materials', 'public');

            // 3. Masukkan data ke tabel event_materials menggunakan relasi model yang sudah kamu buat!
            $event->materials()->create([
                'nama_materi' => $file->getClientOriginalName(), // menyimpan nama asli (cth: Materi_UX.pdf)
                'file_path' => $path                         // menyimpan path untuk unduhan
                
            ]);

            return redirect()->back()->with('success', 'Materi "' . $file->getClientOriginalName() . '" berhasil ditambahkan ke event!');
        }

        return redirect()->back()->with('error', 'Gagal memproses unggahan file materi.');
    }
    public function uploadDocumentation(Request $request, $id)
{
    $event = Event::find($id);
    if (!$event) {
        return redirect()->back()->with('error', 'Data event tidak ditemukan.');
    }

    // Validasi ketat khusus berkas gambar/foto (Maksimal 4MB)
    $request->validate([
        'doc_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
    ]);

    if ($request->hasFile('doc_photo')) {
        $file = $request->file('doc_photo');
        
        // Simpan file fisik ke folder: storage/app/public/event_documentations
        $path = $file->store('event_documentations', 'public');

        // Simpan ke database via relasi Eloquent
        $event->documentations()->create([
            'image_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Foto dokumentasi berhasil ditambahkan ke galeri event!');
    }

    return redirect()->back()->with('error', 'Gagal memproses unggahan foto.');
}

    

    // public function updateToken(Request $request, $eventId)
    // {
    //     // 1. Validasi Input Data Masuk
    //     $request->validate([
    //         'token_presensi' => 'required|string|min:4'
    //     ]);

    //     // 2. Cari data rapat berdasarkan ID
    //     $event = Event::findOrFail($eventId);

    //     // 3. Update Token Baru ke Database (Struktur Program)
    //     $event->update([
    //         'token_presensi' => $request->token_presensi
    //     ]);

    //     // 4. Return Data Keluar (JSON Response)
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Token presensi berhasil diperbarui.'
    //     ], 200);
    // }

    // /**
    //  * METHOD FOR ANGGOTA (Flowchart: Input Token Presensi)
    //  * Hak Akses: Anggota yang Terundang Only
    //  */
    // public function submitPresensi(Request $request, $eventId)
    // {
    //     $request->validate([
    //         'token_input' => 'required|string'
    //     ]);

    //     $user = $request->user();
    //     $event = Event::findOrFail($eventId);

    //     // LOGIKA FLOWCHART 1: Cek apakah Anggota ini masuk dalam daftar undangan rapat?
    //     $participant = $event->participants()->where('user_id', $user->id)->first();

    //     if (!$participant) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Anda tidak terdaftar dalam undangan rapat internal ini.'
    //         ], 403);
    //     }

    //     // LOGIKA FLOWCHART 2: Cocokkan token (Case-Sensitive string matching)
    //     if ($event->token_presensi !== $request->token_input) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Kode Token Salah, silakan periksa kembali.'
    //         ], 422);
    //     }

    //     // LOGIKA FLOWCHART 3: Jika lolos semua, ubah status_hadir menjadi True (1)
    //     $event->participants()->updateExistingPivot($user->id, [
    //         'status_hadir' => true
    //     ]);

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Presensi berhasil! Kehadiran Anda telah dicatat oleh sistem.'
    //     ], 200);
    // }

}