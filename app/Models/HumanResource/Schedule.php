<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
        'shift',
        'time_start',
        'time_end'
    ];

    public $timestamps = false;
    public function position()
    {
        return static::belongsTo(Position::class);
    }

    public function employees()
    {
        return static::hasMany(Employee::class,'position_id', 'position_id');
    }
}