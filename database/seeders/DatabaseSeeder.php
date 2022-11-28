<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Seeder;
use App\Enums\ProjectStatus;
use Illuminate\Support\Facades\Hash;

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
            'logo' => [
                'path' => 'logos/4nNIHJTa2D0rRmJJ5ht3juoQJtXWLO95XysHfTlv.jpg',
                'name' => 'logos/laki.jpeg',
                'extension' => 'jpg',
                'size' => '1024'],
            'website' => 'www.lazar.com',
        ]);

        Client::create([
            'name' => 'Pera',
            'slug' => 'peki',
            'logo' => [
                'path' => 'logos/4nNIHJTa2D0rRmJJ5ht3juoQJtXWLO95XysHfTlv.jpg',
                'name' => 'logos/pera.jpeg',
                'extension' => 'jpg',
                'size' => '1024'],
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

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'role' => ROLE::ADMIN,
             'password' => 'admin',
         ]);

        \App\Models\User::factory()->create([
            'name' => 'viewer',
            'email' => 'viewer@viewer.com',
            'role' => ROLE::VIEWER,
            'password' => 'viewer',
        ]);
    }
}
