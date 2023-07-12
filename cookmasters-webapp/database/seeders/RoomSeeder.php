<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $rooms = 
            [
                'id' => 1,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '18 rue des Blancs Manteaux Paris',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' => json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode([1,2,3,4,5]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode([8,9,10,11,12,14,15,16,17,18,19,20]),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => json_encode(["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]),
                'options' => json_encode(["Service de traiteur", "Parking gratuit"]),
                'user_id' => 1,
        ];

        $rooms_len = 20;

        for ($i = 0; $i <= $rooms_len; $i++) {
            $rooms['id'] = $i+1;
            $room = new Room($rooms);
            $room->save();
        }
    }
}
