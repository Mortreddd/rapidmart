<?php

use App\Models\PO\Product;
use App\Models\PO\Shipper;
use App\Models\PO\Supplier;
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
        Schema::create('shippers', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
        });


        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Supplier::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Shipper::class)->constrained()->cascadeOnDelete();
            $table->float('unit_price');
            $table->integer('quantity');
            $table->float('total_amount');
            $table->dateTime('order_date');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippers');
        Schema::dropIfExists('orders');
    }
};