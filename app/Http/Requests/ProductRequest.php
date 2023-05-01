<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|between:0,100',
            'Row_material' => 'nullable|string',
            'image' => 'nullable|image||mimes:jpg,png,jpeg,gif,svg|max:2000'
        ];
    }
}
