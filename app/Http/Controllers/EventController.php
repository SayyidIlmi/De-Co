<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * METHOD FOR KOORDINATOR (Flowchart: Membuat/Update Token Rapat)
     * Hak Akses: Koordinator Only
     */
    public function updateToken(Request $request, $eventId)
    {
        // 1. Validasi Input Data Masuk
        $request->validate([
            'token_presensi' => 'required|string|min:4'
        ]);

        // 2. Cari data rapat berdasarkan ID
        $event = Event::findOrFail($eventId);

        // 3. Update Token Baru ke Database (Struktur Program)
        $event->update([
            'token_presensi' => $request->token_presensi
        ]);

        // 4. Return Data Keluar (JSON Response)
        return response()->json([
            'status' => 'success',
            'message' => 'Token presensi berhasil diperbarui secara real-time.'
        ], 200);
    }

    /**
     * METHOD FOR ANGGOTA (Flowchart: Input Token Presensi)
     * Hak Akses: Anggota yang Terundang Only
     */
    public function submitPresensi(Request $request, $eventId)
    {
        $request->validate([
            'token_input' => 'required|string'
        ]);

        $user = $request->user();
        $event = Event::findOrFail($eventId);

        // LOGIKA FLOWCHART 1: Cek apakah Anggota ini masuk dalam daftar undangan rapat?
        $participant = $event->participants()->where('user_id', $user->id)->first();

        if (!$participant) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak terdaftar dalam undangan rapat internal ini.'
            ], 403);
        }

        // LOGIKA FLOWCHART 2: Cocokkan token (Case-Sensitive string matching)
        if ($event->token_presensi !== $request->token_input) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kode Token Salah, silakan periksa kembali.'
            ], 422);
        }

        // LOGIKA FLOWCHART 3: Jika lolos semua, ubah status_hadir menjadi True (1)
        $event->participants()->updateExistingPivot($user->id, [
            'status_hadir' => true
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Presensi berhasil! Kehadiran Anda telah dicatat oleh sistem.'
        ], 200);
    }
}