<?php

use App\Models\Employee;
use App\Models\PO\Product;
use App\Models\Sales\Discount;
use App\Models\Sales\Promo;
use App\Models\Sales\Sales;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(Employee::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->integer('quantity');
            $table->foreignIdFor(Discount::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Promo::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('amount');
            $table->timestamps();
        });

        Schema::create('sale_receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sales::class)->constrained()->cascadeOnDelete();
            $table->float('total_income');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('sale_receipts');
        Schema::dropIfExists('sales');
    }
};