<?php

use App\Models\Accounting\Expense;
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
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Expense::class)->constrained()->cascadeOnDelete();
            $table->foreign('sale_receipt_id')->references('id')->on('sale_receipts');
            $table->float('income');
            $table->float('total_cost');
            $table->float('profit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenues');
    }
};