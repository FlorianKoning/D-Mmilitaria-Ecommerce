<?php

namespace App\Http\Requests;

use App\Services\AclService;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $aclService = new AclService();

        if ($aclService->superUserCheck()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mainImage' => ['required', 'file', 'max:10240'],
            'invNumb' => ['required', 'string'],
            'name' => ['required', 'string'],
            'smallDesc' => ['required', 'string'],
            'bigDesc' => ['required', 'string'],
            'inventory' => ['required', 'string', 'numeric'],
            'price' => ['required', 'string', 'numeric'],
            'discountPercentage' => ['nullable', 'string', 'numeric'],
            'discountStartDate' => ['nullable', 'date'],
            'discountEndDate' => ['nullable', 'date'],
        ];
    }
}
