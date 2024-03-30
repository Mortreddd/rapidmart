<?php

namespace Database\Factories\Sales;

use App\Models\PO\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales\Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //foreign key random id's are subjected to change
            'employee_id' => fake()->numberBetween(1, 100),
            'product_id' => fake()->numberBetween(1, Product::count()),
            'quantity' => fake()->numberBetween(1, 10),
            'discount_id' => fake()->optional()->numberBetween(1, 10),
            'promo_id' => fake()->optional()->numberBetween(1, 10),
            'amount' => fake()->randomFloat(2, 10, 1000), //tentative amount
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-6 months', 'now')
        ];
    }
}