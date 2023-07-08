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

    protected $fillable = [
        'name',
        'address',
        'city',
        'postal_code',
        'country',
        'photos',
        'description',
        'capacity',
        'price',
        'type',
        'payment_type',
        'surface',
        'facilities',
        'availability_days',
        'minimum_reservation_hours',
        'reservation_hours',
        'allow_more_people',
        'max_people',
        'caution',
        'activities',
        'rules',
        'options',
        'user_id',
    ];

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'room_equipment');
        // 'room_equipment' est le nom de la table pivot
    }

    public function roomOffers()
    {
        return $this->hasMany(RoomOffer::class);
    }

    // public function service()
    // {
    //     return $this->belongsToMany(Service::class, 'room_equipment', 'room_id', 'equipment_id');
    // }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    public function json2array($json)
    {
        $json = str_replace(array("\n", "\r"), "", $json);
        $json = preg_replace('/([{,]+)(\s*)([^"]+?)\s*:/','$1"$3":',$json);
        $json = preg_replace('/(,)\s*}$/','}',$json);
        
        return json_decode($json, true);
    }
}
