<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    protected $fillable = [
        'room_id',
        'user_id',
        'start_time',
        'end_time',
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

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}