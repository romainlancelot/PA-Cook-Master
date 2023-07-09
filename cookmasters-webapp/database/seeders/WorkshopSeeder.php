<?php

namespace Database\Seeders;

use App\Models\Workshop;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Database\Seeder;
use DateTime;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        $len_users = count($users);

        $workshops = [
            [
                'id' => 1,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'max_people' => 30,
                'user_id' => 1,      
            ],
            [
                'id' => 2,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'max_people' => 30,
                'user_id' => 1,           
            ],
            [
                'id' => 3,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'max_people' => 30,
                'user_id' => 1,           
            ],
            [
                'id' => 4,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'max_people' => 30,
                'user_id' => 1,           
            ],
            [
                'id' => 5,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'max_people' => 30,
                'user_id' => 1,           
            ],
            [
                'id' => 6,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'max_people' => 30,
                'user_id' => 1,           
            ],
            [
                'id' => 7,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'max_people' => 30,
                'user_id' => 1,           
            ],
            [
                'id' => 9,
                'title' => "L’Art des Sauces et des Jus",
                'description' => json_encode(['Une grande majorité des plats français sont constitués ou accompagnés de sauces ou de jus divers. On peut citer par exemple le beurre blanc, la sauce béarnaise, la sauce au vin rouge. Ces sauces apportent du goût, rehaussent une saveur ou effectuent les liaisons entre les arômes de différents aliments d’un même plat. Vous l’aurez compris, les jus et sauces sont incontournables dans la gastronomie française !', 'Dans une ambiance conviviale, en petit groupe et sous la direction d’un Chef Enseignant, vous apprendrez à maîtriser ces accompagnements et vous expérimenterez dans le détail l’ensemble des préparations de jus et sauces proposées par le Chef Le Cordon Bleu.', "Un tablier, torchon et sac isotherme « Le Cordon Bleu » seront offerts. Un certificat de participation vous sera remis par le Chef en fin d’atelier.", "Le saviez-vous ? La recette du beurre blanc a été inventée par Clémence Lefeuvre, en 1860. Elle est composée de beurre, de vinaigre, de vin blanc et d’échalotes. Les proportions peuvent varier selon les goûts et les Chefs de cuisine."]),
                'photos' => 'workshop1.jpg',
                'price' => 92,
                'max_people' => 30,
                'user_id' => 1,           
            ],
            
            
        ];

        $workshop_len = count($workshops);

        for ($i = 0; $i < $workshop_len; $i++) {
            $workshops[$i] = new Workshop($workshops[$i]);
            $workshops[$i]->save();
        }
    }
}
