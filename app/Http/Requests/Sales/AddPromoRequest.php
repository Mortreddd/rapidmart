<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class AddPromoRequest extends FormRequest
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
            'product_name' => 'nullable|string',
            'code' => 'required|string',
            'discount' => 'integer|nullable',
            'promo_id' => 'integer|nullable',
            'date_start' => 'required|date|after:today',
            'valid_until' => 'required|date|after:today|different:date_start'

        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Promo Code is required',
            'date_start.required' => 'Duration Start is required',
            'valid_until.required' => 'Duration End is required'
        ];
    }
}