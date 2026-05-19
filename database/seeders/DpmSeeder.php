<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DpmSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat Akun Pengguna Dummy Berdasarkan Role (RBAC)
        $koordinator = User::create([
            'username' => 'Dimas Sekretaris',
            'email' => 'dimas@dpm.org',
            'password' => 'password123',
            'role' => 'koordinator',
        ]);

        $anggota1 = User::create([
            'username' => 'Aris Anggota PSDM',
            'email' => 'aris@dpm.org',
            'password' => 'password123',
            'role' => 'anggota',
        ]);
        $anggota0 = User::create([
            'username' => 'tupaikidal',
            'email' => 'tupaikidal@dpm.org',
            'password' => 'Kambingguling_001',
            'role' => 'koordinator',
        ]);

        $anggota2 = User::create([
            'username' => 'Budi Anggota Advokasi',
            'email' => 'budi@dpm.org',
            'password' => 'password123',
            'role' => 'anggota',
        ]);

        $staf = User::create([
            'username' => 'Siti Staf Monitoring',
            'email' => 'siti@dpm.org',
            'password' => 'password123',
            'role' => 'staf',
        ]);

        // 2. Membuat Agenda Rapat Dummy
        $rapat1 = Event::create([
            'judul' => 'Rapat Koordinasi Internal Komisi A',
            'deskripsi' => 'Membahas progres evaluasi kinerja BEM bidang internal.',
            'tanggal' => now()->addDays(2),
            'token_presensi' => 'KMS-A', // Token awal dari Koordinator
        ]);

        $rapat2 = Event::create([
            'judul' => 'Rapat Paripurna Kabinet DPM',
            'deskripsi' => 'Penyampaian laporan tengah tahunan.',
            'tanggal' => now()->addDays(5),
            'token_presensi' => 'PARIPURNA',
        ]);

        // 3. Menyambungkan Sistem Undangan (Mengisi Tabel Pivot via Eloquent)
        // Skenario: Aris diundang ke Rapat Komisi A dan Rapat Paripurna
        $rapat1->participants()->attach($anggota1->id, ['registration_type' => 'invited', 'status_hadir' => false]);
        $rapat2->participants()->attach($anggota1->id, ['registration_type' => 'invited', 'status_hadir' => false]);

        // Skenario: Budi HANYA diundang ke Rapat Paripurna saja
        $rapat2->participants()->attach($anggota2->id, ['registration_type' => 'invited', 'status_hadir' => false]);
    }
}
