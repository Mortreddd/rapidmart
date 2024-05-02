<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupplierRequest extends FormRequest
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
            'company_name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required|email|max:255|unique:suppliers,email',
            'description' => 'required|min:10',
            'picture' => 'image|mimes:jpeg,png,jpg|max:10240',
        ];
    }

    public function messages(): array
    {
        return  [
            'company_name.required' => 'Name is required',
            'company_name.max' => 'Name is too long',
            'address.required' => 'Address is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email',
            'email.max' => 'Email is too long',
            'email.unique' => 'Oops! Email already taken!',
            'description.required' => 'Company Description is required',
            'description.min' => 'Company Description is to short (min:10 character)',
            'picture.image' => 'Must be an Image',
            'picture.mimes' => 'Must be an extension of (jpeg,png,jpg)',
            'picture.max' => 'Image is too Big (max upload size: 10 Mb)',

        ];
    }
}