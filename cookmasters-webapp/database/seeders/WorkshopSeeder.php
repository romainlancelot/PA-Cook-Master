<?php

namespace Database\Seeders;

use App\Models\Workshop;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\WorkshopSession;
use DateTime;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        $rooms = Room::all();
        $len_users = count($users);

        $workshops = [
            [
                'id' => 1,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'user_id' => 1,      
            ],
            [
                'id' => 2,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'user_id' => 1,           
            ],
            [
                'id' => 3,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'user_id' => 1,           
            ],
            [
                'id' => 4,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'user_id' => 1,           
            ],
            [
                'id' => 5,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'user_id' => 1,           
            ],
            [
                'id' => 6,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'user_id' => 1,           
            ],
            [
                'id' => 7,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'user_id' => 1,           
            ],
            [
                'id' => 9,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'user_id' => 1,           
            ],
            
            
        ];
        $workshopSessions = [
            [
                'id' => 1,
                'start' => (new DateTime('2023-01-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-02-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id' => 2, 
                'start' => (new DateTime('2023-03-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-04-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id' => 3,
                'start' => (new DateTime('2023-05-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end' => (new DateTime('2023-06-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id'    => 4,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end'   => (new DateTime('2023-08-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id'   => 5,
                'start' => (new DateTime('2023-09-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end'   => (new DateTime('2023-10-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id'    => 6,
                'start' => (new DateTime('2023-11-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end'   => (new DateTime('2023-12-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id'    => 7,
                'start' => (new DateTime('2023-01-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end'   => (new DateTime('2023-02-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id'    => 8,
                'start' => (new DateTime('2023-03-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end'   => (new DateTime('2023-04-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id'    => 9,
                'start' => (new DateTime('2023-05-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end'   => (new DateTime('2023-06-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ],
            [
                'id'   => 10,
                'start' => (new DateTime('2023-07-09 14:15:00'))->format('Y-m-d H:i:s'),
                'end'   => (new DateTime('2023-08-09 14:17:00'))->format('Y-m-d H:i:s'),
                'duration' => '1 jour',
                'max_people' => 30,
                'schedule' => '14h15 - 19h45',
            ]
        ];

        $workshop_len = count($workshops);
        for ($i = 0; $i < $workshop_len; $i++) {
            $workshops[$i] = new Workshop($workshops[$i]);
            $workshops[$i]->save();
        }

        
        $room_len = count($rooms);
        $workshopSession_len = count($workshopSessions);
        
        for ($i = 0; $i < $workshopSession_len; $i++) {
            $workshopSessions[$i] = new WorkshopSession($workshopSessions[$i]);
            $room_random_index = rand(0, $room_len-1);
            $workshop_random_index = rand(0, $workshop_len-1);
            $workshopSessions[$i]->room_id = $rooms[$room_random_index]->id;
            $workshopSessions[$i]->workshop_id = $workshops[$workshop_random_index]->id;
            $workshopSessions[$i]->save();
        }

        foreach ($users as $user) {            
            $workshopSession_random_index = rand(0, $workshopSession_len-1);
            $j = rand(0, 5);
            for ($i = 0; $i < $j; $i++)
            {
                $user->workshopSessions()->attach($workshopSessions[$workshopSession_random_index]);
                $workshopSession_random_index = rand(0, $workshopSession_len-1);
            }
        }
    }
}
