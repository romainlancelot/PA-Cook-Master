<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    /*
    * Get rooms associated to equipment
    */
    public function rooms()
    {
       return $this->belongsToMany(Room::class, 'room_equipment', 'equipment_id', 'room_id');
    }
    public function roomOffers()
    {
        return $this->belongsToMany(RoomOffer::class, 'room_equipment', 'equipment_id', 'room_id');
    }
    public function service()
    {
        return $this->belongsToMany(Service::class, 'room_equipment', 'equipment_id', 'room_id');
    }
}