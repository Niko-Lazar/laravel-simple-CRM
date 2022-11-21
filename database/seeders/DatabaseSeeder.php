<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Seeder;
use App\Enums\ProjectStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'Lazar',
            'slug' => 'laki',
            'logo' => 'logos/lazar.jpeg',
            'website' => 'www.lazar.com',
        ]);

        Client::create([
            'name' => 'Pera',
            'slug' => 'peki',
            'logo' => 'logos/pera.jpeg',
            'website' => 'www.pera.rs',
        ]);

        Client::factory(50)->create();

        Employee::create([
            'name' => 'Fica',
            'email' => 'fica@example.com',
            'phone' => '123456'
        ]);

        Employee::factory(30)->create();

        Project::create([
            'client_id' => 1,
            'title' => 'project 1',
            'slug' => 'project1',
            'description' => 'a short project description',
            'deadline' => date_format(now()->addDays(7), 'Y-m-d'),
            'status' => ProjectStatus::INPROGRESS,
        ]);

        Project::factory(30)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
