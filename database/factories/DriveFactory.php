<?php

namespace Database\Factories;

use App\Models\Drive;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Drive>
 */
class DriveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => fake()->company(),
            'role' => fake()->randomElement(['Software Engineer', 'Systems Engineer', 'Analyst', 'SDE I', 'Graduate Engineer Trainee']),
            'package_lpa' => fake()->randomFloat(2, 3, 50),
            'min_cgpa' => fake()->randomFloat(2, 6, 9),
            'last_date' => fake()->dateTimeBetween('+1 day', '+1 month')->format('Y-m-d'),
        ];
    }
}
