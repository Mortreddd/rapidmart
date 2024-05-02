<?php

namespace App\Http\Requests\Interview;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInterviewScheduleRequest extends FormRequest
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
            'interview_date' => 'required|string',
            'interview_time' => 'required',
            'interviewer_id' => 'required|exists:employees,id',
            'interview_note' => 'nullable|string',
        ];
    }

    public function messages() : array
    {
        return [
            'interview_date.required' => 'Interview date is required',
            'interview_date.date' => 'Interview date must be a date',
            'interview_time.required' => 'Interview time is required',
            'interviewer_id.required' => 'Interviewer ID is required',
            'interviewer_id.exists' => 'Interviewer ID does not exist',
            'interview_note.string' => 'Interview note must be a string',
        ];
    }
}