<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
class StoreFoodRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'img' => [File::image()->max(2048)],
            'availability' => '',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio.',
            'description.required' => 'Il campo descrizione è obbligatorio.',
            'price.required' => 'Il campo prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un valore numerico.',
            'price.min' => 'Il prezzo deve essere un valore positivo.',
            'img.image' => 'Il file deve essere un\'immagine.',
            'img.mimes' => 'Il file deve essere di tipo: :values.',
            'img.max' => 'Il file è troppo pesante.',
            'availability.required' => 'Il campo disponibilità è obbligatorio.',
        ];
    }
}
