<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:141'],
            'last_name' => ['required', 'string', 'max:141'],
            'company' => ['nullable', 'string', 'max:141'],
            'address' => ['required', 'string', 'max:141'],
            'apartment' => ['nullable', 'string', 'max:141'],
            'city' => ['required', 'string', 'max:141'],
            'province_id' => ['required', 'string', 'max:141'],
            'postal_code' => ['required', 'string', 'max:7'],
            'phone_number' => ['required', 'string', 'max:20']
        ];
    }
}
