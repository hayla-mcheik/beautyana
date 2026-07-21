<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaregoryFormRequest extends FormRequest
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
        'name' => [
            'required',
            'string'
        ],
        'menu' => 'required|in:Collections,High Jewelry,AD Signature',
        // 'slug' => [
        //     'required',
        //     'string'
        // ],    
        // 'description' => [
        //     'required',
        // ],
        'image' => [
            'nullable',
            'mimes:jpg,jpeg,png,webp'
        ],
        // 'meta_title' => [
        //     'required',
        //     'string'
        // ],
        // 'meta_keyword' => [
        //     'required',
        //     'string'
        // ],    
        // 'meta_description' => [
        //     'required',
        // ], 
        ];
    }
}
