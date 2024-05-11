<?php

use App\Models\HumanResource\Position;
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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Position::class)->constrained()->cascadeOnDelete();
            $table->enum('shift', ['Day', 'Night'])->default('Day');
            $table->timestamp('time_start');
            $table->timestamp('time_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};