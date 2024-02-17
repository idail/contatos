<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
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
            "nome" => "required|min:6",
            "email" => "required|email|unique:pessoas",
        ];
    }
    
    public function messages()
    {
        return [
            "nome.required" => "Favor preencher o nome da pessoa",
            "nome.min"=>"O nome deve ter no minimo 6 caracteres",
            "email.required" => "Favor preencher o e-mail da pessoa",
            "email.email"=>"Favor informar um e-mail válido",
            "email.unique"=>"Email já consta cadastrado"
        ];
    }
}