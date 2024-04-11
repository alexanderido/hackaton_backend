<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'name' => $this->faker->name(),
            'nationality' => $this->faker->country(),
            'date_of_birth' => $this->faker->date(),
            'photo' => $this->faker->imageUrl(),

        ];
    }
}
