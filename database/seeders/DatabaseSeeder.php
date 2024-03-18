<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\HumanResource\Department;
use App\Models\HumanResource\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Department::factory()->count(6)->sequence(
            [
                'name' => 'HR',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Accounting',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Customer Service',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Information Technology',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Logistics',
                'created_at' => now(),
                'updated_at' => now()
            ]
        )
        ->create();
        Position::factory()->count(30)->sequence(
            [
                'name' => 'HR Manager',
                'department_id' => 1,
                'salary_per_hour' => 35,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Recruitment Officer',
                'department_id' => 1,
                'salary_per_hour' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Payroll Administrator',
                'department_id' => 1,
                'salary_per_hour' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Training Coordinator',
                'department_id' => 1,
                'salary_per_hour' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Marketing Manager',
                'department_id' => 2,
                'salary_per_hour' => 38,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Digital Manager',
                'department_id' => 2,
                'salary_per_hour' => 32,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Advertising Coordinator',
                'department_id' => 2,
                'salary_per_hour' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Market Research Analyst',
                'department_id' => 2,
                'salary_per_hour' => 33,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Accounting Manager',
                'department_id' => 3,
                'salary_per_hour' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Payable Accountant',
                'department_id' => 3,
                'salary_per_hour' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Receivable Accountant',
                'department_id' => 3,
                'salary_per_hour' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Financial Analyst',
                'department_id' => 3,
                'salary_per_hour' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Book Keeper',
                'department_id' => 3,
                'salary_per_hour' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Auditor',
                'department_id' => 3,
                'salary_per_hour' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Customer Service Representative',
                'department_id' => 4,
                'salary_per_hour' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cashier',
                'department_id' => 4,
                'salary_per_hour' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Store Associate',
                'department_id' => 4,
                'salary_per_hour' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Store Manager',
                'department_id' => 4,
                'salary_per_hour' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Shift Supervisor',
                'department_id' => 4,
                'salary_per_hour' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Loss Prevention Associate',
                'department_id' => 4,
                'salary_per_hour' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'IT Support Specialist',
                'department_id' => 5,
                'salary_per_hour' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Systems Administrator',
                'department_id' => 5,
                'salary_per_hour' => 35,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'IT Security Specialist',
                'department_id' => 5,
                'salary_per_hour' => 37,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Database Administrator',
                'department_id' => 5,
                'salary_per_hour' => 35,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Web Developer',
                'department_id' => 5,
                'salary_per_hour' => 31,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Supply Chain Analyst',
                'department_id' => 6,
                'salary_per_hour' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Logistic Manager',
                'department_id' => 6,
                'salary_per_hour' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Supply Chain Analyst',
                'department_id' => 6,
                'salary_per_hour' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Logistic Manager',
                'department_id' => 6,
                'salary_per_hour' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Warehouse Manager',
                'department_id' => 6,
                'salary_per_hour' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
        )
        ->create();
        Employee::factory()->create([
            'first_name' => 'Emmanuel',
            'middle_name' => 'Meneses',
            'last_name' => 'Male',
            'gender' => 'M',
            'age' => 20,
            'phone' => '09123456789',
            'image' => 'avatars/sample-image.jpg',
            'position_id' => 1,
            'email' => 'emmanmale@gmail.com',
            'password' => Hash::make('emmanuelmale25'),
            'employment_status' => 'Full Time',
            'salary' => 25000,

        ]);
        Employee::factory()->create();

    }
}