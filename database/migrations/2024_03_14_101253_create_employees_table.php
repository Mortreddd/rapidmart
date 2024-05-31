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
            $table->id()->from(1000);
            $table->string('first_name')->index();
            $table->string('middle_name');
            $table->string('last_name')->index();
            $table->enum('gender', ['M', 'F']);
            $table->string('resume');
            $table->integer('age');
            $table->date('birthday');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->string('address');
            $table->foreignIdFor(Position::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete();
            $table->string('email');
            $table->string('password')->nullable();
            $table->enum('employment_status', ['Full Time', 'Part Time', 'Resigned', 'Terminated', 'Training'])->default('Training');
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->float('salary')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->text('notes')->nullable();
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