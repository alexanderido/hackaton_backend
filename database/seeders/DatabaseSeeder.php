<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(120)->create();
        \App\Models\Tag::factory(50)->create();
        \App\Models\Profile::factory(100)->create();
        \App\Models\Guest::factory(200)->create();
        \App\Models\Agency::factory(20)->create();
        \App\Models\Destination::factory(1000)->create();


        $profiles = \App\Models\Profile::all();
        $guests = \App\Models\Guest::all();
        $destinations = \App\Models\Destination::all();

        $tags = \App\Models\Tag::all();

        foreach ($profiles as $profile) {
            $profile->tags()->attach(
                $tags->random(rand(20, 30))
            );
        }
        foreach ($guests as $guest) {
            $guest->tags()->attach(
                $tags->random(rand(20, 30))
            );
        }
        foreach ($destinations as $destination) {
            $destination->tags()->attach(
                $tags->random(rand(10, 20))
            );
        }
    }
}
