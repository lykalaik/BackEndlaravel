<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeverageRequest extends FormRequest
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
            'beverage_name' => 'required|string|max:255',
            'image_link'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|string|max:255',
        ];
    }
}
