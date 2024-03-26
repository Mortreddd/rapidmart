<?php

use App\Models\PO\Order;
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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete();
            $table->float('sub_total');
            $table->float('tax');
            $table->float('total_cost');
            $table->datetime('payment_due');
            $table->string('account_number');
            $table->string('invoice_file'); // * DIRECTORY FOR INVOICES FILES
            $table->datetime('invoice_date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};