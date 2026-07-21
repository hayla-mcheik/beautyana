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
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        // Check if this is a store (create) or update request
        if ($this->isMethod('post')) {
            // For creating a new product - require at least 2 images
            $imageRules = [
                'required',
                'array',
           
            ];
        } else {
            // For updating a product - images are optional
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
            // 'slug' => [
            //     'required',
            //     'string'
            // ],         
            // 'small_description' => [
            //     'required',
            //     'string',
            // ],           
            'description' => [
                'required',
                'string',
            ],
            'original_price' => [
                'nullable',
                'integer',  
            ],  
            'selling_price' => [
                'required',
                'integer',  
            ],
            'quantity' => [
                'required',
                'integer',  
            ],
            // 'trending' => [
            //     'nullable', 
            // ], 
            'status' => [
                'nullable', 
            ],  
            // 'meta_title' => [
            //     'required',
            //     'string',
            //     'max:255'  
            // ],  
            // 'meta_keyword' => [
            //     'nullable',
            //     'string',
            // ],
            // 'meta_description' => [
            //     'nullable',
            //     'string',
            // ],
            'image' => $imageRules,
            'image.*' => [
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:2048'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
    'image.required' => 'Please upload at least one image.',
    'image.min' => 'Please upload at least one image.',
    'image.*.image' => 'Each file must be a valid image.',
    'image.*.mimes' => 'Images must be jpeg, png, jpg, gif or webp.',
    'image.*.max' => 'Each image must not exceed 2MB.',
        ];
    }
}