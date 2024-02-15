<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'streetOne' => 'required|string|max:255',
            'streetTwo' => 'nullable|string|max:255',
            'municipality' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zipCode' => 'required|string|max:20',
        ];
    }
}
