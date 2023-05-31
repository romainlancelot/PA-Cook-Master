<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $photos = [
            substr(fake()->image('public/images/services', 360, 360, 'animals', true, true, 'cats', true, 'jpg'),7),
            substr(fake()->image('public/images/services', 360, 360, 'animals', true, true, 'cats', true, 'jpg'),7),
            substr(fake()->image('public/images/services', 360, 360, 'animals', true, true, 'cats', true, 'jpg'),7),
        ];
    
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'photos' => json_encode($photos),
            'availabilities' => fake()->sentence(),
            'capacity' => fake()->sentence(),
            'price' => fake()->randomDigit(),
            'duration' => fake()->sentence(),
        ];
    }
}
