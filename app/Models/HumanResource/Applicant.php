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
        'birthday',
        'phone',
        'email',
        'resume',
        'position_id',
        'department_id',
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

        return date('F d, Y', strtotime(Carbon::parse($this->created_at)));
    }

    public function isAppointed()
    {
        return Interview::where('applicant_id', $this->id)->exists();
    }

    public function updatedDate()
    {
        return date('F d, Y', strtotime(Carbon::parse($this->updated_at))); 
    }

}