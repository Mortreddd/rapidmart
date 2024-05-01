<?php

use App\Models\HumanResource\Applicant;
use App\Models\HumanResource\Employee;
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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Applicant::class)->constrained()->cascadeOnDelete();
            $table->date('interview_date');
            $table->time('interview_time');
            $table->foreignIdFor(Employee::class, 'interviewer_id')->constrained('employees')->cascadeOnDelete();
            $table->text('interview_note')->nullable();
            $table->enum('status', ['Accepted', 'Pending', 'Rejected'])->default('Pending');
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};