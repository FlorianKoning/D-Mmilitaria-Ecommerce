<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
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
            'first-name' => ['required', 'string', 'max:141'],
            'last-name' => ['required', 'string', 'max:141'],
            'email' => ['required', 'email'],
            'phone-number' => ['required', 'max:13'],
            'message' => ['required', 'string']
        ];
    }
}
