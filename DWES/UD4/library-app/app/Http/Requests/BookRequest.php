<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:60',
            'category' => 'required|string|max:30',
            'author_id' => 'required|exists:authors,id',
            'description' => 'required|string|max:100',
            'price' => 'required|numeric|between:0,9999999.99',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than :max characters.',
            
            'category.required' => 'The category field is required.',
            'category.string' => 'The category must be a string.',
            'category.max' => 'The category may not be greater than :max characters.',
            
            'author_id.required' => 'The author field is required.',
            'author_id.exists' => 'The selected author does not exist.',
            
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than :max characters.',
            
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.between' => 'The price must be between :min and :max.',
        ];
    }
}
