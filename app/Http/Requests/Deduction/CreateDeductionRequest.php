<?php

namespace App\Http\Requests\Deduction;

use Illuminate\Foundation\Http\FormRequest;

class CreateDeductionRequest extends FormRequest
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
            'description' => 'required|min:1',
            'amount' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Description is required',
            'description.min' => 'Description must be filled',
            'amount.required' => 'Description must be filled'
        ];
    }
}