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
            'duration' => $this->faker->time('H:i:s', '05:00:00'),
            'video' => $this->faker->url(),
            'introduction' => $this->faker->realText(500),
            'content' => $this->faker->realText(5000),
            'conclusion' => $this->faker->realText(500)
        ];
    }
}
