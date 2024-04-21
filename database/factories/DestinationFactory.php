<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['hotel', 'restaurant', 'tour'];
        $categories = ['adventure', 'relax', 'cultural', 'gastronomic', 'romantic', 'family', 'business'];
        $cityes = ['San José Province',  'Heredia Province'];
        $states = ['San José', 'Heredia'];
        $rnd = random_int(0, 1);

        return [
            'agency_id' => \App\Models\Agency::all()->random()->id,
            'name' => fake()->sentence(),
            'description' => fake()->text(),
            'location' => fake()->latitude() . ',' . fake()->longitude(),
            'type' => $types[random_int(0, 2)],
            'category' => $categories[random_int(0, 3)],
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'cover' => fake()->imageUrl(),
            'logo' => fake()->imageUrl(),
            'city' =>  $cityes[$rnd],
            'state' => $states[$rnd],
            'country' => 'Costa Rica',
            'status' => (random_int(0, 10) === 1) ? 'closed' : 'open',
            'age_restriction' => (random_int(0, 10) === 1) ? 18 : 0,
        ];
    }
}
