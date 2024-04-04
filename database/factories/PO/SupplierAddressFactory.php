<?php

namespace Database\Factories\PO;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Po\SupplierAddress>
 */
class SupplierAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'Street_name' => fake()->streetName(),
            'Baranggay' => fake()->secondaryAddress(),
            'Town' => fake()->city(),
            'Province' => fake()->state(),
            'Zip_code' => fake()->postcode(),

        ];
    }
}
