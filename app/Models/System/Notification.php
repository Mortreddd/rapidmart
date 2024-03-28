<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource\Employee;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'message',
        'status',
        'created_at', 
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}