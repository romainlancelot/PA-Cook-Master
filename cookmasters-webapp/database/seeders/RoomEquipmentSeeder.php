<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Room;
use App\Models\RoomEquipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = Room::all();

        $equipments = Equipment::all();

        $len_rooms = count($rooms);
        $len_equipments = count($equipments);

        for ($i = 0; $i < $len_rooms; $i++) {
            $equipment = rand(3, $len_equipments);

            RoomEquipment::create([
                'room_id' => $rooms[$i]->id,
            ]);
        }
    }
}
