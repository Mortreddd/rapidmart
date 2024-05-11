<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\HumanResource\Employee;
use Illuminate\Support\Facades\Auth;

class TerminationEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->position_id === 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reason' => 'required|string',
            'remaining_days' => 'required|between:1,90'
        ];
    }

    public function messages(): array
    {
        return [
            'reason.required' => 'The termination reason is required',
            'remaining_days.required' => 'The remaining days is required',
            'remaining_days.integer' => 'The remaining days must be an integer',
            'remaining_days.between' => 'The remaining days must be between 1 and 90'
        ];
    }
}