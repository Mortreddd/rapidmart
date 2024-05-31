<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'resume' => 'required|string',
            'birthday' => 'required|string',
            'phone' => 'required|string',
            'image' => 'nullable|string|mimes:png,jpg,jpeg|max:10240',
            'address' => 'required|string',
            'position_id' => 'required|integer',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:8',
            'employment_status' => 'required|string',
            'notes' => 'nullable|string'
        ];
    }

    /**
     * Get the validation messages for the defined rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'middle_name.required' => 'The middle name field is required.',
            'last_name.required' => 'The last name field is required.',
            'gender.required' => 'The gender field is required.',
            'age.required' => 'The age field is required.',
            'age.integer' => 'The age must be an integer.',
            'resume.required' => 'The resume field is required.',
            'birthday.required' => 'The birthday field is required.',
            'phone.required' => 'The phone field is required.',
            'image.mimes' => 'The image must be a file of type: png, jpg, jpeg.',
            'image.max' => 'The image may not be greater than 10 MB.',
            'address.required' => 'The address field is required.',
            'position_id.required' => 'The position ID field is required.',
            'position_id.integer' => 'The position ID must be an integer.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'employment_status.required' => 'The employment status field is required.'
        ];
    }
}