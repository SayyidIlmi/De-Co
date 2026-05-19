<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel users dan events dengan relasi Cascade
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            
            // Aturan Bisnis: Tipe pendaftaran (misal: Rapat Internal = Invited)
            $table->enum('registration_type', ['invited', 'self_register'])->default('invited');
            
            // Status kehadiran presensi token
            $table->boolean('status_hadir')->default(false);
            $table->timestamps();

            // Aturan Integritas: Mencegah 1 user diundang 2 kali di rapat yang sama
            $table->unique(['user_id', 'event_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};