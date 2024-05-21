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
        'date',
        'check_in',
        'check_out',
        'total_hours'
    ];

    public function schedule()
    {
        return static::belongsTo(Schedule::class);
    }

    public function emloyees()
    {
        return static::hasMany(Employee::class);
    }

    public function leave()
    {
        return static::belongsTo(Leave::class);
    }
    
}