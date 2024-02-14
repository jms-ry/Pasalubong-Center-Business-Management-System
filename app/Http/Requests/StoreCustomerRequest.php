<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email_address' => 'required|email|unique:customers,email_address',
            'streetOne' => 'required|string|max:255',
            'streetTwo' => 'nullable|string|max:255',
            'municipality' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zipCode' => 'required|string|max:20',
        ];
    }
}
