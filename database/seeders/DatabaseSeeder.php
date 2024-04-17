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
        \App\Models\User::factory(1)->create([
            'name' => 'Admin',
            'email' => 'user@idoagency.com',
            'role' => 'user',
        ]);
        \App\Models\User::factory(1)->create([
            'name' => 'Admin',
            'email' => 'agency@idoagency.com',
            'role' => 'agency',
        ]);

        \App\Models\Tag::factory(50)->create();
        \App\Models\Profile::factory(1)->create();

        \App\Models\Agency::factory(1)->create();
        \App\Models\Destination::factory(20)->create();


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
