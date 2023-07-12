<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopSession extends Model
{
    protected $fillable = [
        'start', 'end', 'duration', 'schedule', 'workshop_id', 'room_id', 'max_people'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_workshop_session');
    }
    
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
