<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "countrycode" => "required",
            "numero" => "required|min:9|max:9",
        ];
    }
    
    public function messages()
    {
        return [
            "countrycode.required" => "Favor preencher o country code",
            "numero.required"=> "Favor preencher o número",
            "numero.min" => "O número deve ter 9 digitos",
            "numero.max"=> "O número deve ter 9 digitos",
        ];
    }
}
