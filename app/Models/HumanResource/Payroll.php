<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    public static array $STATUSES = ['Pending', 'Approved', 'Rejected'];
    protected $fillable = [
        'attendance_id',
        'employee_id',
        'deduction_id',
        'benefit_id',
        'total_salary',
        'net_pay',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}