<?php

namespace Database\Seeders;

use App\Models\Workshop;
use App\Models\WorkshopSession;
use App\Models\User;
use App\Models\Room;
use App\Models\Comments;
use Illuminate\Database\Seeder;
use DateTime;

class WorkshopSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        $len_users = count($users);


        $workshops = Workshop::all();
        $rooms = Room::all();
        $workshopsessions = [
            [
                'id' => 1,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 2,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 3,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 4,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 5,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 6,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 7,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 9,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 10,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 11,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 12,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 13,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 14,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 15,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 16,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 17,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 18,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 19,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 20,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 21,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 22,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 23,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 24,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 25,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 26,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 27,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 28,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 29,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
            [
                'id' => 30,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-07-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '5h',
                'schedule' => 'Horaires : 14h15 - 19h45',
                'workshop_id' => rand(1, count($workshops)-1),
                'room_id' => rand(1, count($rooms)),    
            ],
        ];

        $workshopsession_len = count($workshopsessions);

        for ($i = 0; $i < $workshopsession_len; $i++) {
            $workshopsessions[$i] = new WorkshopSession($workshopsessions[$i]);
            $workshopsessions[$i]->save();
        }

    }
}
