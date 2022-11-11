<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();

        Client::create([
            'name' => 'Lazar',
            'slug' => 'laki',
            'logo' => 'logos/lazar.jpeg',
            'website' => null,
        ]);

        Client::create([
            'name' => 'Pera',
            'slug' => 'peki',
            'logo' => 'logos/pera.jpeg',
            'website' => null,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
