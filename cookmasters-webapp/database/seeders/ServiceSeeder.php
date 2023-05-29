<?php

namespace Database\Seeders;

use App\Models\RoomEquipment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomEquipment = RoomEquipment::inRandomOrder()->first();
        $service = Service::factory()->create();
        $service->roomEquipment()->associate($roomEquipment);
        $service->save();
    }
}
