<?php

namespace App\Http\Requests\Interview;

use Illuminate\Foundation\Http\FormRequest;

class CreateInterviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'applicant_id' => 'required|exists:applicants,id',
            'interview_date' => 'required|string',
            'interview_time' => 'required',
            'interviewer_id' => 'required|exists:employees,id',
            'interview_note' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'applicant_id.required' => 'Applicant ID is required',
            'applicant_id.exists' => 'Applicant ID does not exist',
            'interview_date.required' => 'Interview date is required',
            'interview_date.date' => 'Interview date must be a date',
            'interview_time.required' => 'Interview time is required',
            'interview_time.date_format' => 'Interview time must be in format h:iA',
            'interviewer_id.required' => 'Interviewer ID is required',
            'interviewer_id.exists' => 'Interviewer ID does not exist',
            'interview_note.string' => 'Interview note must be a string',
        ];
    }
}