<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quality_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspector_id')->constrained('employees')->cascadeOnDelete();
            $table->foreignId('po_id')->constrained('purchase_orders')->cascadeOnDelete();
            $table->text('reports_pdf_path');
            $table->text('status');
            $table->text('description');
            $table->text('isEmailed_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quality_reports');
    }
};
