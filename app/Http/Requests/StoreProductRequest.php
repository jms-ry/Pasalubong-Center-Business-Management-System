<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'bar_code' => 'required|string|max:255|unique:products',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'unit' => 'required|string|max:50',
            'unit_price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'delivered_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }
}
