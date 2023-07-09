<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopSession extends Model
{
    protected $fillable = [
        'start', 'end', 'duration', 'schedule', 'workshop_id', 'room_id'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
