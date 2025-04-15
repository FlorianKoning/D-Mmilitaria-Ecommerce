<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceSettingsRequest extends FormRequest
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
            'bankaccount_number' => ['required', 'max:22', 'min:18', 'string'],
            'bankaccount_name' => ['required', 'string'],
            'company_name' => ['required', 'string'],
            'KVK_number' => ['required', 'string', 'min:8', 'max:8'],
            'phone_number' => ['required', 'string', 'max:14', 'min:10'],
            'address' => ['required', 'string']
        ];
    }
}
