<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     */
    public function rules()
    {
        // Create = POST
        if ($this->isMethod('post')) {

            $imageRules = [
                'required',
                'array',
            ];

        } else {

            // Update = images are optional
            $imageRules = [
                'nullable',
                'array'
            ];
        }

        return [

            'category_id' => [
                'required',
                'integer'
            ],

            'name' => [
                'required',
                'string'
            ],

            'description' => [
                'required',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Pricing
            |--------------------------------------------------------------------------
            */

            'original_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'discount_percentage' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100',
            ],

            /*
            |--------------------------------------------------------------------------
            | IMPORTANT
            |--------------------------------------------------------------------------
            |
            | selling_price is NOT submitted by the admin anymore.
            | Laravel calculates it automatically from:
            |
            | original_price - discount_percentage
            |
            */

            'quantity' => [
                'required',
                'integer',
                'min:0',
            ],

            'status' => [
                'nullable',
            ],

            'image' => $imageRules,

            'image.*' => [
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:2048'
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages()
    {
        return [

            'image.required' =>
                'Please upload at least one image.',

            'image.min' =>
                'Please upload at least one image.',

            'image.*.image' =>
                'Each file must be a valid image.',

            'image.*.mimes' =>
                'Images must be jpeg, png, jpg, gif or webp.',

            'image.*.max' =>
                'Each image must not exceed 2MB.',

            'original_price.required' =>
                'Please enter the original price.',

            'original_price.numeric' =>
                'Original price must be a valid number.',

            'original_price.min' =>
                'Original price cannot be negative.',

            'discount_percentage.numeric' =>
                'Discount percentage must be a valid number.',

            'discount_percentage.min' =>
                'Discount percentage cannot be negative.',

            'discount_percentage.max' =>
                'Discount percentage cannot be greater than 100.',
        ];
    }
}