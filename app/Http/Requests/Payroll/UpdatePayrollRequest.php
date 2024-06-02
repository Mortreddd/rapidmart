<?php

namespace App\Http\Requests\Payroll;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePayrollRequest extends FormRequest
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
            'benefit_id' => ['nullable', 'integer'],
            'deduction_id' => ['nullable', 'integer'],
            'status' => ['required', 'string', 'in:Pending,Approved,Approval,Rejected'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'benefit_id.integer' => 'Benefit ID must be an integer',
            'deduction_id.integer' => 'Deduction ID must be an integer',
            'status.required' => 'Status is required',
            'status.string' => 'Status must be a string',
            'status.in' => 'Status must be either Pending, Approved, Approval, or Rejected',
        ];
    }
}