<?php

namespace Database\Factories\Inventory;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => fake()->name(),
            'image' => 'ProductsImg/ProductDefault.png',
            'stocks' => fake()->numberBetween(0, 300),
            'price' => fake()->numberBetween(50, 1000),
            'barcode' => fake()->numberBetween(999999999, 100000000),
            'catergory_id' => fake()->numberBetween(1, 5)
        ];
    }
}
