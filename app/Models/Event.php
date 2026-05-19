<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    /**
     * Atribut/Kolom yang dapat diisi secara massal (Mass Assignable).
     * Menerjemahkan kamus data ERD menjadi variabel pemrograman.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'token_presensi', // Kode rahasia yang di-update dinamis oleh Koordinator
    ];

    /**
     * Mengatur tipe data kolom secara otomatis (Casting).
     * Memastikan string tanggal dari DB dikonversi menjadi objek Carbon/Datetime PHP.
     */
    protected $casts = [
        'tanggal' => 'datetime',
    ];

    /**
     * RELASI ORM: Many-to-Many ke Model User (Melalui Tabel Pivot 'participants')
     * 
     * Menghubungkan Event dengan Anggota yang diundang oleh Koordinator.
     * Method ini mewakili fungsionalitas utama sistem undangan rapat.
     */
    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants', 'event_id', 'user_id')
                    ->withPivot('registration_type', 'status_hadir')
                    ->withTimestamps();
    }

    /**
     * RELASI ORM: One-to-Many ke Model EventTimeline
     * 
     * Menghubungkan Event dengan detail susunan acara/agenda rapat per jam.
     * Jika Event dihapus, data timeline terkait akan kehilangan induknya (Foreign Key constraint).
     */
    public function timelines()
    {
        return $this->hasMany(EventTimeline::class, 'event_id', 'id');
    }

    /**
     * HELPER METHOD / LOCAL SCOPE: Memeriksa validitas token input
     * 
     * Logika enkapsulasi untuk mencocokkan string token secara peka huruf (case-sensitive).
     * Dapat dipanggil di Controller: Event::find($id)->hasValidToken($input)
     * 
     * @param string $inputToken
     * @return bool
     */
    public function hasValidToken(string $inputToken): bool
    {
        return $this->token_presensi === $inputToken;
    }
}