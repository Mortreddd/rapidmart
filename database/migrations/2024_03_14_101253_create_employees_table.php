<?php

use App\Models\HumanResource\Department;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->index();
            $table->string('middle_name');
            $table->string('last_name')->index();
            $table->enum('gender', ['M', 'F']);
            $table->int('age');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->foreignIdFor(Position::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete();
            $table->string('email');
            $table->string('password');
            $table->enum('employment_status', ['Full Time', 'Part Time', 'Contractual', 'Probationary', 'Resigned', 'Terminated', 'Training']);
            $table->float('salary');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};