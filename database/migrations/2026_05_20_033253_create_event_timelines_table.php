<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     */
    public function up(): void
    {
        Schema::create('event_timelines', function (Blueprint $table) {
            $table->id();
            
            // INDUK RELASI: Menghubungkan tabel ini ke tabel 'events'
            // Menggunakan metode shorthand Laravel yang otomatis mendeteksi tipe data BigInteger 
            // dan langsung membuat aturan Foreign Key Constraint + Cascade on Delete.
            $table->foreignId('event_id')
                  ->constrained('events')
                  ->onDelete('cascade');
            
            // Atribut Waktu & Deskripsi Rangkaian Acara
            $table->date('tanggal_event');
            $table->string('agenda'); // Menyimpan Deskripsi Kegiatan/Timeline Description
            
            $table->timestamps();
            
            // OPTIMASI: Membuat indeks gabungan untuk mempercepat query sorting timeline per event
            $table->index(['event_id', 'tanggal_event']);
        });
    }

    /**
     * Batalkan migrasi (Rollback).
     */
    public function down(): void
    {
        // Menghapus constraints terlebih dahulu sebelum menghapus tabel demi keamanan integritas DB
        Schema::table('event_timelines', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
        });
        
        Schema::dropIfExists('event_timelines');
    }
};