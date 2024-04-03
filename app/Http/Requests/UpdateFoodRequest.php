<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;
class UpdateFoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Auth::check();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:256',
            'description' => 'required|max:256',
            'price' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'availability' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome deve essere una stringa.',
            'name.max' => 'La nome non può superare :max caratteri.',
            'description.required' => 'Il campo descrizione è obbligatorio.',
            'description.max' => 'La descrizione non può superare :max caratteri.',
            'price.required' => 'Il campo prezzo è obbligatorio.',
            'price.numeric' => 'Il campo prezzo deve essere un numero.',
            'img.image' => 'Il file deve essere un\'immagine.',
            'img.mimes' => 'Il file deve essere di tipo: :values.',
            'img.max' => 'Il file è troppo pesante.',
            'availability.required' => 'Il campo disponibilità è obbligatorio.',
        ];
    }
}
