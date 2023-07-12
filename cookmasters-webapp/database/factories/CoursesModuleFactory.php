<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CoursesModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(10, 60),
            'video' => $this->faker->url(),
            'introduction' => $this->faker->realText(150),
            'description' => $this->faker->realText(400),
            'conclusion' => $this->faker->realText(150)
        ];
    }
}
