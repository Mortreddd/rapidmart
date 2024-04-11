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

    public function submissionDate()
    {
        $createdAt = Carbon::parse($this->created_at);
        
        $monthName = $createdAt->format('F'); 
        $dayOfMonth = $createdAt->format('d'); 
        $year = $createdAt->format('Y');
        
        return "$monthName $dayOfMonth, $year"; 
    }
}