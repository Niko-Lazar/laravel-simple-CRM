<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => fake()->unique()->word(),
            'name' => fake()->name(),
            'logo' => [
                'path' => 'logos/4nNIHJTa2D0rRmJJ5ht3juoQJtXWLO95XysHfTlv.jpg',
                'name' => 'logo.jpeg',
                'extension' => 'jpg',
                'size' => '1024'],
        ];
    }
}
