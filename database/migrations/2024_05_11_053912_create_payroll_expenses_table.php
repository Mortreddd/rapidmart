<?php

use App\Models\HumanResource\Payroll;
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
        Schema::create('payroll_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Payroll::class)->constrained()->cascadeOnDelete();
            $table->float('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_expenses');
    }
};