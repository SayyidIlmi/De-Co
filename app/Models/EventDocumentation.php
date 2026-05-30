<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDocumentation extends Model
{
    use HasFactory;

    protected $table = 'event_documentations';

    protected $fillable = [
        'event_id',
        'image_path',
    ];

    /**
     * Relasi balik ke Event
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}