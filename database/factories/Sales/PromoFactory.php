<?php

namespace Database\Factories\Sales;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->numberBetween(1, 100),
            'code' => fake()->word(),
            'percent' => fake()->numberBetween(5, 50),
            'from_date' => fake()->dateTimeBetween('-1 years', 'now'),
            'till_date' => fake()->dateTimeBetween('-6 months', 'now'),
            'conditions' => fake()->sentence()
        ];
    }
}
