<?php

namespace App\Http\Requests;

use App\Services\AclService;
use Illuminate\Foundation\Http\FormRequest;

class ProductCatagoyRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:191']
        ];
    }
}
