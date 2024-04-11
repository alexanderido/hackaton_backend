<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agency>
 */
class AgencyFactory extends Factory
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
            'name' => ucfirst(fake()->word()),
            'name_juridical' => ucfirst(fake()->word()),
            'cedula' => '1234567890',
            'phone_number' => fake()->phoneNumber(),
            'address' => ucfirst(fake()->address()),
            'email' => ucfirst(fake()->email()),
            'bank_account' => '888777-113',

        ];
    }
}
