<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AtLeastOneCategorySelected;

// Helpers
use Illuminate\Support\Facades\Auth;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:256',
            'address' => 'required|string|max:256',
            'iva' => 'required|string|min:11|max:11',
            'img' => 'required|url|max:2048',
            'categories' => ['required', new AtLeastOneCategorySelected],
        ];
    }

    public function messages(): array
    {
        return [
            'categories.required' => 'Seleziona almeno una categoria.',
            'iva.min' => 'Questo campo deve contenere almeno 11 cifre',
            'iva.max' => 'Questo campo deve contenere massimo 11 cifre',
            'img.url' => 'Questo campo deve contenere un link url',
        ];
    }
}
