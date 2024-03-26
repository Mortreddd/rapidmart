<?php

use App\Models\PO\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\MockObject\Invocation;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('defectives', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete();
            $table->int('quantity');
            $table->timestamps();
        });


        Schema::create('receive_orders', function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Invocation::class)->constrained->caseCart();
            $table->datetime('total_cost');
            $table->date('arrival')->nullable();
        });
        
        Schema::create('order_receipts', function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Invocation::class)->constrained->caseCart();
            $table->datetime('total_cost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defectives');
        Schema::dropIfExists('receive_orders');
        Schema::dropIfExists('order_receipts');
    }
};