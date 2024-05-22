<?php

namespace Database\Factories\PO;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HumanResource\Employee;
use App\Models\PO\Supplier;

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
        $employees = Employee::pluck('id');
        $suppliers = Supplier::pluck('id');
        return [
            'subject' => fake()->realText(20),
            'creator_id' => fake()->randomElement($employees),
            'supplier_id' => fake()->randomElement($suppliers),
            'pdf_path' => 'PurchaseOrderPDF/default.pdf',
            'status' => 'onPr',
            'total_cost' => rand(100, 10000),
        ];
    }
}
