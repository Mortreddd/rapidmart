<?php

use App\Models\PO\Catergory;
use App\Models\PO\Supplier;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('image');
            $table->integer('stocks');
            $table->float('buying_price');
            $table->float('selling_price');
            $table->bigInteger('barcode');
            $table->string('unit');
            $table->foreignIdFor(Catergory::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Supplier::class)->constrained()->cascadeOnDelete();
            $table->timestamps();//created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};