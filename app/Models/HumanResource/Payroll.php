<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    public static array $STATUSES = ['Pending', 'Approved', 'Approval', 'Rejected'];
    protected $fillable = [
        'employee_id',
        'deduction_id',
        'benefit_id',
        'status',
        'total_salary',
        'net_pay',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];


    public function employee()
    {
        return static::belongsTo(Employee::class);
    }


    public function deduction()
    {
        return static::belongsTo(Deduction::class);
    }

    public function benefit()
    {
        return static::belongsTo(Benefit::class);
    }
}