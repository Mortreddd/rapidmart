<?php

namespace Database\Factories\PO;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PO\PurchaseOrder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PO\QualityReports>
 */
class QualityReportsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $purchaseOrder = PurchaseOrder::pluck('id');
        return [
            'inspector_id' => fake()->randomElement([1000, 1001]),
            'po_id' => fake()->unique()->randomElement($purchaseOrder),
            'reports_pdf_path' => 'QIR/default.pdf',
            'status' => fake()->randomElement(['passed', 'failed']),
            'description' => fake()->realText(200),
            'isEmailed_status' => fake()->randomElement(['Send', 'NotSend']),
        ];
    }
}
