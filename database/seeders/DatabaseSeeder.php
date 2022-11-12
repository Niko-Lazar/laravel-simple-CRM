<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Seeder;
use App\Enums\ProjectStatusEnum;

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
        Project::truncate();

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

        Project::create([
            'client_id' => 1,
            'title' => 'project 1',
            'slug' => 'project1',
            'description' => 'a short project description',
            'deadline' => date_format(now()->addDays(2), 'Y-m-d'),
            'status' => ProjectStatusEnum::InProgress,
        ]);

        Project::create([
            'client_id' => 1,
            'title' => 'project 2',
            'slug' => 'project2',
            'description' => 'a short project description',
            'deadline' => date_format(now()->addDays(2), 'Y-m-d'),
            'status' => ProjectStatusEnum::InProgress,
        ]);

        Project::create([
            'client_id' => 1,
            'title' => 'project 3',
            'slug' => 'project3',
            'description' => 'a short project description',
            'deadline' => date_format(now()->addDays(7), 'Y-m-d'),
            'status' => ProjectStatusEnum::InProgress,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
