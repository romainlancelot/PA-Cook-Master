<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Room;
use App\Models\RoomOffer;
use Database\Factories\RoomOfferFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rooms = Room::all();
        $equipments = Equipment::all();
    
        if ($equipments->count() < 3) {
            throw new Exception('Not enough equipments to assign to rooms.');
        }
    
        foreach ($rooms as $room) {
            $randomEquipments = $equipments->random(3);
            $room->equipments()->attach($randomEquipments->pluck('id')->toArray());
            // Crée une nouvelle offre pour la salle avec ces équipements
            $roomOffer = RoomOffer::create(['room_id' => $room->id]);
    
            // Attache les équipements à l'offre de salle
            $roomOffer->equipments()->attach($randomEquipments->pluck('id')->toArray());
        }
    }
}
