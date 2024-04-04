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
            's_companyname' => fake()->name(),
            's_address' => SupplierAddress::factory()->create()->id,
            's_email' => fake()->unique()->safeEmail(),
            's_description' => fake()->realText(20),

        ];
    }
}
