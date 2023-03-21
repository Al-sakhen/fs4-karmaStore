<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['nullable'],
            'price' => ['required' , 'numeric'],
            'image' => [ 'mimes:png,jpg,jpeg'],
            'quantity' => ['required' , 'numeric'],
            'category_id' => ['required' , 'numeric' , 'exists:categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category is required'
        ];
    }
}
