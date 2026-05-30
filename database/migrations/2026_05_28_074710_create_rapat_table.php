<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rapat', function (Blueprint $table) {
            $table->id();                                     // Primary Key (id)
            $table->string('judul');                          // Judul/Nama Rapat
            $table->date('tgl_mulai');                          
            $table->date('tgl_selesai');                       
            $table->string('agenda');                          
            $table->string('notulensi');                          
            $table->string('location');                       // Lokasi Rapat
            $table->string('penanggung_jawab');               // Penanggung Jawab Acara
            $table->string('token_presensi', 6)->unique();    // Token Acak 6 Karakter Unik
            $table->timestamps();                             // create_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapat');
    }
};
