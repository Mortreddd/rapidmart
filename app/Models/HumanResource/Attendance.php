<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'employee_id',
        'leave_id',
        'date',
        'check_in',
        'check_out',
        'total_hours',
        'created_at',
        'updated_at'
    ];

    public function schedule()
    {
        return static::belongsTo(Schedule::class);
    }

    public function employee()
    {
        return static::belongsTo(Employee::class);
    }

    public function leave()
    {
        return static::belongsTo(Leave::class);
    }
    
}