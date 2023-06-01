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
        RoomEquipment::create([
            'room_id' => 1,
            'equipment_id' => 1,
        ]);
    }
}
