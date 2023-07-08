<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id', 
        'user_id', 
        'start_date', 
        'end_date', 
        'number_of_people', 
        'total_price', 
        'status', 
        'payment_intent_id', 
        'payment_status', 
        'payment_receipt_url',
        'payment_date',
        'cancelled_at',
        'message',
        'is_read',
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
