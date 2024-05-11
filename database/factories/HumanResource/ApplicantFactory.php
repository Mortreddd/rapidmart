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
        $position = fake()->randomElement(Position::all());
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['M', 'F']),
            'age' => fake()->numberBetween(20, 45),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'resume' => 'dummy-resume.pdf',
            'birthday' => fake()->date('Y-m-d', '2000-01-01'),
            'position_id' => $position->id,
            'department_id' => $position->department_id,
            'employment_status' => fake()->randomElement(['Full Time', 'Part Time']),
            'status' => fake()->randomElement(['Accepted', 'Pending', 'Rejected']),
            'notes' => fake()->sentence(),
            'created_at' => fake()->dateTimeBetween('-1 years', 'now'),
            'updated_at' => fake()->dateTimeBetween('-6 months', 'now')
        ];
    }
}