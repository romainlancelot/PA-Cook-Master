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

        $rooms = [
            [
                'id' => 1,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
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
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' =>    7,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' =>    8,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' =>   9,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' =>  10,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
            [
                'id' => 11,
                'name' => 'Salle 201, Bâtiment A, 2ème étage.',
                'is_active' => true,
                'address' => '123 Rue de la Conférence',
                'city' => 'Paris',
                'postal_code' => '75000',
                'country' => 'France',
                'photos' =>  json_encode(["a.jpg", "a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg"]),
                'description' => "Salle de conférence moderne avec une capacité de 50 personnes. Équipée d'un projecteur, de chaises confortables et d'une connexion Wi-Fi.",
                'capacity' => 50,
                'price' => 200,
                'type' => 'Conférence',
                'surface' => 100,
                'facilities' => json_encode(["Wi-Fi", "Projecteur", "Climatisation"]),
                'availability_days' => json_encode(["lundi", "mardi", "mercredi", "jeudi", "vendredi"]),
                'minimum_reservation_hours' => 4,
                'reservation_hours' => json_encode(['9h', '10h', '11h', '14h', '15h', '16h']),
                'allow_more_people' => true,
                'max_people' => 70,
                'caution' => 500,
                'activities' => json_encode(["Conférences", "Présentations", "Réunions"]),
                'rules' => '["Animaux non autorisés", "Nourriture et boissons interdites dans la salle"]',
                'options' => '["Service de traiteur", "Parking gratuit"]',
                'user_id' => 1,
            ],
        ];

        $rooms_len = count($rooms);

        for ($i = 0; $i < $rooms_len; $i++) {
            $rooms[$i] = new Room($rooms[$i]);
            $rooms[$i]->save();
        }
    }
}
