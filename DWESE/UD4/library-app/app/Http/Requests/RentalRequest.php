<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RentalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'book_id' => 'required|exists:books,id',
            'loan_date' => [
                'required',
                'date',
                Rule::unique('rentals', 'loan_date')->where(function ($query) {
                    return $query->where('book_id', $this->input('book_id'))
                        ->whereNull('return_date');
                }),
                'after_or_equal:' . now()->toDateString(),
            ],
            // Puedes agregar más reglas de validación según tus necesidades
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => 'Please select a book.',
            'book_id.exists' => 'The selected book does not exist.',
            'loan_date.required' => 'Please select a loan date.',
            'loan_date.date' => 'Invalid date format for loan date.',
            'loan_date.unique' => 'The selected book is already rented on this date.',
            'loan_date.after_or_equal' => 'The loan date must be present or future.',
            // Puedes agregar más mensajes personalizados aquí
        ];
    }
}
