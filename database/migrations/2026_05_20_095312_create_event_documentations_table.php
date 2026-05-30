<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_documentations', function (Blueprint $table) {
            $table->id();
            
            // TERPAUT KE EVENT: Jika event dihapus, galeri foto otomatis terhapus dari DB
            $table->foreignId('event_id')
                  ->constrained('events')
                  ->onDelete('cascade');
                  
            $table->string('image_path');          // Menyimpan lokasi folder foto di storage (e.g., "documentations/xyz.jpg")
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_documentations');
    }
};