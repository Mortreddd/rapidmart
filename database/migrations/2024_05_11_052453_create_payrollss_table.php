<?php
use App\Models\HumanResource\Attendance;
use App\Models\HumanResource\Benefit;
use App\Models\HumanResource\Deduction;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Payroll;
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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Attendance::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Employee::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Deduction::class)->nullable();
            $table->foreignIdFor(Benefit::class)->nullable();
            $table->float('total_salary');
            $table->float('net_pay');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_receipts');
        Schema::dropIfExists('payrolls');
    }
};