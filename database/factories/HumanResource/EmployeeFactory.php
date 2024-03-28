<?php

namespace Database\Factories\HumanResource;

use App\Models\HumanResource\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['M', 'F']),
            'age' => fake()->numberBetween(18, 35),
            'birthday' => fake()->date('Y-m-d', '2000-01-01'),
            'phone' => fake()->phoneNumber(),
            'image' => 'avatars/sample-image.jpg',
            'position_id' => fake()->numberBetween(1, Position::count()),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make(fake()->password(8)),
            'employment_status' => fake()->randomElement(['Full Time', 'Part Time', 'Resigned', 'Terminated', 'Training']),
            'salary' => fake()->numberBetween(20000, 50000),
            'notes' => fake()->sentence(10)
        ];
    }
}