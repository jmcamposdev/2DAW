<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Only authenticated users can create authors
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:60',
            'nationality' => 'required|string|max:30',
            'gender' => [
                'required',
                Rule::in(['M', 'F']),
            ],
            'age' => 'required|integer|min:18|max:100',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The First Name field is required.',
            'first_name.string' => 'The First Name must be a string.',
            'first_name.max' => 'The First Name may not be greater than 30 characters.',

            'last_name.required' => 'The Last Name field is required.',
            'last_name.string' => 'The Last Name must be a string.',
            'last_name.max' => 'The Last Name may not be greater than 60 characters.',

            'nationality.required' => 'The Nationality field is required.',
            'nationality.string' => 'The Nationality must be a string.',
            'nationality.max' => 'The Nationality may not be greater than 30 characters.',

            'gender.required' => 'The Gender field is required.',
            'gender.in' => 'The Gender field must be "M" or "F".',

            'age.required' => 'The Age field is required.',
            'age.integer' => 'The Age must be an integer.',
            'age.min' => 'The Age must be at least 0.',
        ];
    }


}
