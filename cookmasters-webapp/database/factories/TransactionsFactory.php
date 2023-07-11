<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
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
            'cooking_recipe_id' => $this->faker->numberBetween(1, 11),
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(1, 5),
            'accepted_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'in_preparation' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'in_delivery' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'delivered_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'commented' => false,
        ];
    }
}
