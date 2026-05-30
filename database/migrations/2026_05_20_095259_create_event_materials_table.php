<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_materials', function (Blueprint $table) {
            $table->id();
            
            // TERPAUT KE EVENT: Jika event dihapus, file materi otomatis terhapus dari DB
            $table->foreignId('event_id')
                  ->constrained('events')
                  ->onDelete('cascade');
                  
            $table->string('nama_materi'); // Misal: "Notulensi Rapat Pleno.pdf"
            $table->string('file_path');   // Menyimpan lokasi folder file di storage (e.g., "materials/abc.pdf")
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_materials');
    }
};