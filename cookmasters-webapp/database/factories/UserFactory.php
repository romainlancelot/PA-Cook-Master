<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => 2,
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'birthday' => $this->faker->date(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'zip_code' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'email_verified_at' => now(),
            'subscription_plan_id' => $this->faker->numberBetween(1, 3),
            'password' => bcrypt(Str::random(20)),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
