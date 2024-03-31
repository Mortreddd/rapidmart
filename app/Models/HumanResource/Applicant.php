<?php

namespace App\Models\HumanResource;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'age',
        'address',
        'phone',
        'email',
        'resume',
        'position_id',
        'employement_status',
        'status',
        'created_at',
        'updated_at',
        'notes'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function position()
    {
        return static::belongsTo(Position::class);
    }

    public function submissionDate()
    {
        $createdAt = Carbon::parse($this->created_at);
        
        $monthName = $createdAt->format('F'); 
        $dayOfMonth = $createdAt->format('d'); 
        $year = $createdAt->format('Y');
        
        return "$monthName $dayOfMonth, $year"; 
    }

    public function updatedDate()
    {
        
    }
}