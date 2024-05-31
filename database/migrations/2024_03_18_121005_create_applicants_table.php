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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->enum('gender', ['M', 'F']);
            $table->integer('age');
            $table->date('birthday');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('resume')->nullable(); // directory of a resume file
            $table->foreignIdFor(Position::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete();
            $table->enum('employment_status', ['Full Time', 'Part Time', 'Contractual', 'Probationary', 'Resigned', 'Terminated', 'Training'])->default('Full Time');
            $table->enum('status', ['Accepted', 'Pending', 'Rejected', 'Employed'])->default('Pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};