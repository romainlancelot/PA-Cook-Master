<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopSession extends Model
{
    protected $fillable = [
        'workshop_id', 'session_date'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
