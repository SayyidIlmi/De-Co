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
        'file_path',
        'location',
        'penanggung_jawab',
        'token_presensi', 
    ];


    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants', 'event_id', 'user_id')
                    ->withPivot('registration_type', 'status_hadir')
                    ->withTimestamps();
    }


    public function timelines()
    {
        return $this->hasMany(EventTimeline::class, 'event_id', 'id');
    }

    public function materials()
{
    return $this->hasMany(EventMaterial::class, 'event_id', 'id');
}

public function documentations()
{
    return $this->hasMany(EventDocumentation::class, 'event_id', 'id');
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
public function pendaftar() {
    return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')->withTimestamps();
}
}