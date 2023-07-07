<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoomSeeder::class,
            EquipmentSeeder::class,
            RoomEquipmentSeeder::class,
            RoomOfferSeeder::class,
            ServiceSeeder::class,
            UsersSeeder::class,
            CookingRecipesSeeder::class,
            RecipesStepsSeeder::class,
            IngredientsSeeder::class,
            IngredientsRecipesSeeder::class
        ]);
    }
}
