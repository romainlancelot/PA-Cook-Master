<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'photos',
        'description',
        'price',
        'availablequantity',
    ];
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
