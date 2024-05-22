<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:employees,email'
        ];
    }

    public function messages(): array
    {
        return [
            'email.exists' => 'The email address does not exist in our records.',
            'email.required' => 'The email address field is required.',
            'email.email' => 'The email address must be a valid email address.'
        ];

    }
}