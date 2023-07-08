<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomOffer extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'room_offer_equipment');
        // 'room_offer_equipment' est le nom de la table pivot pour RoomOffer et Equipment
    }
}
