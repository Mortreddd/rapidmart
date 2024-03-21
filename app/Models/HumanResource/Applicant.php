<?php

namespace App\Models\HumanResource;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'age',
        'address',
        'phone',
        'email',
        'position_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function submissionDate()
    {
        $createdAt = Carbon::parse($this->created_at);
        
        $monthName = $createdAt->format('F'); 
        $dayOfMonth = $createdAt->format('d'); 
        $year = $createdAt->format('Y');
        
        return "$monthName $dayOfMonth, $year"; 
    }
}