<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'price', 'duration', 'room_id'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function sessions()
    {
        return $this->hasMany(WorkshopSession::class);
    }
}
