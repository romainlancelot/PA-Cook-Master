<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(3, 32),
            'body' => $this->faker->realText(),
            'rating' => $this->faker->numberBetween(1, 5),
            'commentable_id' => $this->faker->numberBetween(1, 32),
            'commentable_type' => $this->faker->randomElement(['App\Models\CookingRecipes']),
        ];
    }
}
