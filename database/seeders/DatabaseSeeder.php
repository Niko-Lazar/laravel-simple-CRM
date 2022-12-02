<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Models\User;
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

        Project::factory(30)->create();

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@admin.com',
            'phone' => '000000',
            'role' => Role::SUPERADMIN,
            'password' => 'admin',
        ]);


         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'phone' => '000001',
             'role' => Role::ADMIN,
             'password' => 'admin',
         ]);

        \App\Models\User::factory()->create([
            'name' => 'viewer',
            'email' => 'viewer@viewer.com',
            'phone' => '000002',
            'role' => Role::VIEWER,
            'password' => 'viewer',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'employee',
            'email' => 'employee@employee.com',
            'phone' => '000003',
            'role' => Role::EMPLOYEE,
            'password' => 'employee',
        ]);

        User::factory(6)->create();
    }
}
