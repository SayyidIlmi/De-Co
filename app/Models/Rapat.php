<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;

    // Nama tabel di database kamu (jika tidak jamak)
    protected $table = 'rapat'; 

    protected $fillable = [
        'judul',
        'location',
        'tgl_mulai',
        'tgl_selesai',
        'agenda',
        'notulensi',
        'penanggung_jawab',
        'token_presensi',
    ];

    public function undanganAnggota()
{
    return $this->belongsToMany(User::class, 'rapat_fungsionaris', 'rapat_id', 'user_id');
}
}
