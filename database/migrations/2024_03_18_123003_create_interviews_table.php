<?php

use App\Models\Employee;
use App\Models\HumanResource\Applicant;
use App\Models\HumanResource\Interview;
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
            $table->timestamp('interview_date');
            $table->text('interview_notes')->nullable();
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