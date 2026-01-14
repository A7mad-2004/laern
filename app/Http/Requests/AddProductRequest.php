<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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

                'name'=>'required|string|min:3|max:255|unique:products',
                'price'=>'required|numeric|min:1',
                'discount'=>'required|numeric|nim"0',
                'color'   =>['nullable','string'],
                'brand' =>'required|integer|exists:brands,id',
                'product_image'=>'required|file'

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'u must enter the name',
            'name.min'      => 'the min digits of 000',
        ];
    }
}
