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

        return [
            'agency_id' => \App\Models\Agency::all()->random()->id,
            'name' => fake()->sentence(),
            'description' => fake()->text(),
            'location' => fake()->latitude() . ',' . fake()->longitude(),
            'type' => $types[random_int(0, 2)],
            'category' => $categories[random_int(0, 6)],
            'status' => 'open',
            'age_restriction' => random_int(0, 21),
        ];
    }
}