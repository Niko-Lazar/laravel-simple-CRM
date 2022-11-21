<?php

namespace Database\Factories;

use App\Enums\ROLE;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'role' => fake()->randomElement([ROLE::EMPLOYEE->value, ROLE::SUPERIOR->value]),
        ];
    }
}
