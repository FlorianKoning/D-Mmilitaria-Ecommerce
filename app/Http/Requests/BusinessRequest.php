<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
            'business_email' => 'nullable|email',
            'business_phone_number' => 'nullable|string|min:9|max:17',
            'kvk_number' => 'nullable',
            'btw_number' => 'nullable',
            'business_address' => 'nullable',
            'business_logo' => 'nullable|file'
        ];
    }
}
