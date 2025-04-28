<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsExhibitionRequest extends FormRequest
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
            'exhibition_name' => ['required', 'string', 'max:191'],
            'exhibition_location' => ['required', 'string', 'max:191'],
            'exhibition_date' => ['required', 'date'],
            'exhibition_start_time' => ['nullable', 'max:5'],
            'exhibition_end_time' => ['nullable', 'max:5'],
            'present' => ['nullable', 'string'],
        ];
    }
}
