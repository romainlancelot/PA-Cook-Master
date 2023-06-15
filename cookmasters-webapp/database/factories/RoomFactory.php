<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $photos = [
            fake()->image('public/images/rooms/', 360, 360, 'animals', true, true, 'cats', true, 'jpg'),
            fake()->image('public/images/rooms/', 360, 360, 'animals', true, true, 'cats', true, 'jpg'),
            fake()->image('public/images/rooms/', 360, 360, 'animals', true, true, 'cats', true, 'jpg'),
        ];

        return [
            'name' => fake()->name(),
            'address' => fake()->sentence(2),
            'photos' => json_encode($photos),
            'description' => fake()->paragraph(),
            'capacity' => fake()->randomDigit(),
            'facilities' => fake()->sentence(2),
            'availabilities' => fake()->sentence(5),
            'price' => fake()->sentence(),
        ];
    }
}
