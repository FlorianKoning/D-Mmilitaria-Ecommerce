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
            'first-name' => ['required', 'string', 'max:10'],
            'last-name' => ['required', 'string', 'max:10'],
            'company' => ['nullable', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:25'],
            'apartment' => ['nullable', 'string', 'max:15'],
            'city' => ['required', 'string', 'max:25'],
            'provinces' => ['required', 'string', 'max:12'],
            'postal-code' => ['required', 'string', 'max:7'],
            'phone' => ['required', 'string', 'max:13']
        ];
    }
}
