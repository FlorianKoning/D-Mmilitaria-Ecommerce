<?php

namespace App\Http\Requests;

use App\Services\AclService;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'productImage' => ['nullable', 'file'],
            'invNumb' => ['required', 'string'],
            'name' => ['required', 'string'],
            'smallDesc' => ['required', 'string'],
            'bigDesc' => ['required', 'string'],
            'inventory' => ['nullable', 'string', 'numeric'],
            'price' => ['required', 'string', 'numeric'],
            'discountPercentage' => ['nullable', 'string', 'numeric'],
            'discountStartDate' => ['nullable', 'date'],
            'discountEndDate' => ['nullable', 'date'],
            'makeActive' => ['nullable'],
            'showInventory' => ['nullable'],
            'active' => ['nullable', 'string'],
            'makeInActive' => ['nullable'],
        ];
    }
}
