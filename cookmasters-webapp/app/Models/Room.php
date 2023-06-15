<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    /**
    * Get the equipments associated with the room.
    */
    public function equipments()
    {
       return $this->belongsToMany(Equipment::class, 'room_equipment', 'room_id', 'equipment_id');
    }
    public function roomOffers()
    {
        return $this->belongsToMany(RoomOffer::class, 'room_equipment', 'room_id', 'equipment_id');
    }

    public function service()
    {
        return $this->belongsToMany(Service::class, 'room_equipment', 'room_id', 'equipment_id');
    }
    
    public function json2array($json)
    {
        $json = str_replace(array("\n", "\r"), "", $json);
        $json = preg_replace('/([{,]+)(\s*)([^"]+?)\s*:/','$1"$3":',$json);
        $json = preg_replace('/(,)\s*}$/','}',$json);
        
        return json_decode($json, true);
    }
}
