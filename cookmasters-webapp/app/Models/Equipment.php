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
        'category',
        'marque',
        'key_features',
        'colors',
        'simple_description',
        'warranty_url',
        'height',
        'width',
        'depth',
        'dimensional_guide_url',
        'name_3d',
        'manual_url',
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
