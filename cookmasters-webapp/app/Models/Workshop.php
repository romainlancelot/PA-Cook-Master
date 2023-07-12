<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'user_id', 'title', 'start_hour', 'end_hour', 'description', 'duration', 'photos', 'room_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sessions()
    {
        return $this->hasMany(WorkshopSession::class);
    }
}
