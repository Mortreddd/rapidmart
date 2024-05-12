<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'interview_date',
        'interview_time',
        'interviewer_id',
        'interview_note'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function interviewer()
    {
        return static::belongsTo(Employee::class);
    }

    public function interviewDate()
    {
        // return date('F d, Y', strtotime($this->attributes['interview_date']));
        return Carbon::parse($this->interview_date)->format('F d, Y');
    }

    public function interviewTime()
    {
        // return date('h:i A', strtotime($this->attributes['interview_time']));
        return Carbon::parse($this->interview_date)->format('h:i A');
    }

    public function getAppointedDateAttribute()
    {
        // return date('h:i A', strtotime($this->attributes['created_at']));
        return Carbon::parse($this->created_at)->format('h:i A');
    }

}