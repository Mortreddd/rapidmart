<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'age',
        'birthday',
        'phone',
        'position_id',
        'email',
        'password',
        'employment_status',
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

}