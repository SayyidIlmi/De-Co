<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTimeline extends Model
{
    protected $table = 'event_timelines';

    protected $fillable = [
        'event_id',
        'jam_mulai',
        'jam_selesai',
        'agenda',
    ];

    /**
     * RELASI ORM: Inverse One-to-Many (Belongs To)
     * 
     * Mengembalikan data timeline ke objek Event induknya.
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}