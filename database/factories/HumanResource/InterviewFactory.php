<?php

namespace Database\Factories\HumanResource;

use App\Models\HumanResource\Applicant;
use App\Models\HumanResource\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HumanResource\Interview>
 */
class InterviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'applicant_id' => fake()->randomElement(Applicant::pluck('id')->toArray()),
                'interview_date' => fake()->dateTimeBetween('+1 week', '+1 month'),
                'interview_time' => fake()->time(),
                'interview_note' => fake()->sentence(),
                'status' => fake()->randomElement(['Accepted', 'Pending', 'Rejected', 'Cancelled']),
                'interviewer_id' => fake()->randomElement(Employee::whereIn('position_id', [1, 2])->pluck('id')->toArray()),
                'created_at' => Carbon::now()
        ];
    }
}