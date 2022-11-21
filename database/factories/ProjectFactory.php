<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => fake()->numberBetween(1, 50),
            'slug' => fake()->unique()->slug(),
            'title' => fake()->word(),
            'description' => fake()->text(),
            'deadline' => fake()->date(),
            'status' => fake()->randomElement([ProjectStatus::INPROGRESS->value, ProjectStatus::FINISHED->value])
        ];
    }
}
