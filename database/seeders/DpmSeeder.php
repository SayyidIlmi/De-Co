<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Rapat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DpmSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat Akun Pengguna Dummy Berdasarkan Role (RBAC)
        $anggota0 = User::create([
            'username' => 'tupaikidal',
            'email' => 'tupaikidal@dpm.org',
            'password' => 'Kambingguling_001',
            'role' => 'koordinator',
        ]);
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
        $rapat1 = Rapat::create([
            'judul'            => 'Rapat Pleno Anggaran Internal Komisi A',
            'location'         => 'Gedung Sekretariat DPM',
            'tgl_mulai'        => now()->addDays(2)->format('Y-m-d'),
            'tgl_selesai'      => now()->addDays(2)->format('Y-m-d'),
            'agenda'           => 'Pembahasan Rencana Anggaran Semester 2026',
            'notulensi'        => 'https://docs.google.com/document/d/1z3Slkx2rUZv9wSl0P0tt_lKAkXUqw8VWej2zVikiVls/edit?usp=sharing',
            'penanggung_jawab' => 'Dimas Sekretaris',
            'token_presensi'   => strtoupper(Str::random(6)), // Token awal dari Koordinator
        ]);

        $rapat2 = Rapat::create([
            'judul'            => 'Koordinasi Terbatas Persiapan Suksesi',
            'location'         => 'Ruang Media Center',
            'tgl_mulai'        => now()->addDays(5)->format('Y-m-d'),
            'tgl_selesai'      => now()->addDays(5)->format('Y-m-d'),
            'agenda'           => 'Koordinasi Persiapan Suksesi',
            'notulensi'        => 'https://docs.google.com/document/d/1z3Slkx2rUZv9wSl0P0tt_lKAkXUqw8VWej2zVikiVls/edit?usp=sharing',
            'penanggung_jawab' => 'Dimas Sekretaris',
            'token_presensi'   => strtoupper(Str::random(6)),
        ]);
        
        $event1 = Event::create([
            'judul' => 'Rapat Koordinasi Internal Komisi A',
            'deskripsi' => 'Membahas progres evaluasi kinerja BEM bidang internal.',
            'file_path' => 'banner/bg6G93I2XnnP5o0RqAn87CS5aZ588g8XJKE0W3G4.png',
            'location' => 'Ruang Sidang Gedung C',
            'penanggung_jawab' => 'Dimas Sekretaris',
            'token_presensi' => 'KMS01A'
        ]);

        // Mengisi Susunan Acara (Timeline Description) untuk Event 1
        $event1->timelines()->createMany([
            [
                'tanggal_event' => now()->addDays(2)->format('Y-m-d'), // Day 1
                'agenda' => 'Day 1: Pembukaan oleh Koordinator & Pemaparan Kendala Internal',
            ],
            [
                'tanggal_event' => now()->addDays(3)->format('Y-m-d'), // Day 2
                'agenda' => 'Day 2: Sinkronisasi Solusi Antar Divisi & Perumusan Berita Acara',
            ],
        ]);

        $event1->materials()->createMany([
            [
                'nama_materi' => 'Proposal Rencana Kerja Komisi A.pdf',
                'file_path' => 'materials/proposal_rapat_komisi_a.pdf', // Simulasi letak file di storage/app/public/materials/
            ],
            [
                'nama_materi' => 'Daftar Nilai Evaluasi Kinerja BEM Semester 1.pdf',
                'file_path' => 'materials/evaluasi_bem_s1.pdf',
            ],
        ]);

        $event1->documentations()->createMany([
            [
                'image_path' => 'documentations/rapat_komisi_a_1.jpg', // Simulasi letak foto di storage/app/public/documentations/
            ],
            [
                'image_path' => 'documentations/rapat_komisi_a_2.jpg',
            ],
        ]);


        // 3. MEMBUAT EVENT 2: SIDANG PARIPURNA
        $event2 = Event::create([
            'judul' => 'Sidang Paripurna Tengah Tahun DPM',
            'deskripsi' => 'Penyampaian laporan pertanggungjawaban setengah periode organisasi.',
            'file_path' => 'banner/bg6G93I2XnnP5o0RqAn87CS5aZ588g8XJKE0W3G4.png',
            'location' => 'Aula Utama Kampus',
            'penanggung_jawab' => 'Ketua Umum DPM',
            'token_presensi' => 'PRP2026'
        ]);

        // Mengisi Susunan Acara (Timeline Description) untuk Event 2
        $event2->timelines()->createMany([
            [
                'tanggal_event' => now()->addDays(5)->format('Y-m-d'), // Day 1
                'agenda' => 'Day 1: Seremonial Pembukaan & Sambutan Pihak Rektorat',
            ],
            [
                'tanggal_event' => now()->addDays(6)->format('Y-m-d'), // Day 2
                'agenda' => 'Day 2: Sidang Pleno I (Pembacaan Berkas LPJ Utama oleh Kabinet)',
            ],
            [
                'tanggal_event' => now()->addDays(7)->format('Y-m-d'), // Day 3
                'agenda' => 'Day 3: Sidang Pleno II (Pandangan Umum Komisi & Tanggapan Fraksi)',
            ],
            [
                'tanggal_event' => now()->addDays(8)->format('Y-m-d'), // Day 4
                'agenda' => 'Day 4: Sidang Pleno III (Ketukan Palu, Pengesahan Konsideran & Penutupan)',
            ],
        ]);

        $event2->materials()->createMany([
            [
                'nama_materi' => 'Buku Panduan Tata Tertib Sidang Paripurna 2026.pdf',
                'file_path' => 'materials/tatib_paripurna_2026.pdf',
            ],
            [
                'nama_materi' => 'Bundel Laporan Pertanggungjawaban Setengah Periode.pdf',
                'file_path' => 'materials/lpj_setengah_periode.pdf',
            ],
        ]);

        $event2->documentations()->createMany([
            [
                'image_path' => 'documentations/paripurna_pembukaan.jpg',
            ],
            [
                'image_path' => 'documentations/paripurna_ketok_palu.jpg',
            ],
        ]);


        // 4. MEMASUKKAN ANGGOTA KE DAFTAR UNDANGAN (SISTEM INTERN)
        // Menghubungkan Aris Anggota ke Event 1 dan Event 2 melalui tabel pivot
        $event1->participants()->attach($anggota1->id, ['registration_type' => 'invited', 'status_hadir' => false]);
        $event2->participants()->attach($anggota1->id, ['registration_type' => 'invited', 'status_hadir' => false]);

        // 3. Menyambungkan Sistem Undangan (Mengisi Tabel Pivot via Eloquent)
        // Skenario: Aris diundang ke Rapat Komisi A dan Rapat 
        $rapat1->undanganAnggota()->attach([$anggota1->id]);
        $rapat2->undanganAnggota()->attach([$anggota2->id, $anggota1->id, $staf->id]);
    }
}
