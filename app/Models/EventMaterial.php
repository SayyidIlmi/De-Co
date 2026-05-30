<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventMaterial extends Model
{
use HasFactory;

    // Menentukan nama tabel secara eksplisit (opsional, tapi aman)
    protected $table = 'event_materials';

    // Kolom yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'event_id',
        'nama_materi',
        'file_path',
    ];

    /**
     * Relasi kebalikannya (Inverse Relationship)
     * Setiap materi pasti dimiliki oleh satu Event
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}