<?php

namespace Database\Factories\PO;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PO\PurchaseOrder>
 */
class PurchaseOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject' => fake()->realText(20),
            'creator_id' => 1001,
            'supplier_id' => 1,
            'pdf_path' => 'PurchaseOrderPDF/default.pdf',
            'status' => 'onPr',
            'total_cost' => rand(100, 10000),
        ];
    }
}
