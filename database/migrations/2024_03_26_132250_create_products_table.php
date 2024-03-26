<?php

use App\Models\PO\Catergory;
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
        Schema::created('suppliers', function(Blueprint $table){
            $table->id();
            $table->string('supplier_name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('address');
            $table->string('postal_code');
            $table->string('phone');
        });


        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->integer('stocks');
            $table->float('price');
            $table->foreignIdFor(Catergory::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Supplier::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('products');
    }
};