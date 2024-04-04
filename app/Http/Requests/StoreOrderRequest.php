<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "min:2", "max:50"],
            "email" => ["required", "min:10", "max:100"],
            "address" => ["required", "min:10"],
            "phone_num" => ["required", "min:9", "max:164"],
            "status" => ["required"],
            "total" => ["required"],
        ];
    }
}
