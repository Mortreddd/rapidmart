<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;


class Employee extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    static $AUTHORIZED_POSITIONS_ID = [1, 2, 3];
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'age',
        'resume',
        'birthday',
        'phone',
        'image',
        'address',
        'position_id',
        'department_id',
        'email',
        'password',
        'employment_status',
        'email_verified_at',
        'created_at',
        'updated_at',
        'notes'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'password' => 'hashed',
        'updated_at' => 'datetime'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function employedDate()
    {
        return date('F d, Y', strtotime(Carbon::parse($this->created_at)));
    }

    public function position()
    {
        return static::belongsTo(Position::class);
    }

    public function department()
    {
        return static::belongsTo(Department::class);
    }

    public function leave()
    {
        return static::belongsTo(Leave::class, 'id', 'employee_id');
    }

    public function attendance()
    {
        return static::belongsTo(Attendance::class);
    }


}