<?php

namespace Database\Factories\PO;

use App\Models\Po\SupplierAddress;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Po\supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->name(),
            'address' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'description' => fake()->realText(20),
            'picture'=>'SupplierImg/default.png',
        ];
    }
}