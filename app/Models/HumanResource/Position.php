<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource\Department;
class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'salary_per_hour',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function department()
    {
        return static::belongsTo(Department::class);
    }
}