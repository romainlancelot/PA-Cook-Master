<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Room;
use App\Models\RoomEquipment;
use App\Models\RoomOffer;
use Database\Factories\RoomOfferFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i != 5; $i++) {
            $roomEquipment = RoomEquipment::inRandomOrder()->first();
            $roomOffer = RoomOffer::factory()->create();
            $roomOffer->roomEquipment()->associate($roomEquipment);
            $roomOffer->save();    
        }
    }
}
