<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// Helpers
use Illuminate\Support\Facades\Auth;

class StoreFoodRequest extends FormRequest
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
            'description' => 'required|max:256',
            'price' => 'required|numeric',
            'img' => 'required|url|max:10048',
            'availability' => 'required'
        
        
        ];
    }
}
