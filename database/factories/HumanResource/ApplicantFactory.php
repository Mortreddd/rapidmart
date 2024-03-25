<?php

namespace Database\Factories\HumanResource;

use App\Models\HumanResource\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HumanResource\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['M', 'F']),
            'age' => fake()->numberBetween(20, 45),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'position_id' => fake()->numberBetween(1, Position::count()),
            'employment_status' => fake()->randomElement(['Full Time', 'Part Time']),
            'status' => fake()->randomElement(['Accepted', 'Pending', 'Rejected']),
            'created_at' => fake()->dateTimeBetween('-1 years', 'now')
        ];
    }
}