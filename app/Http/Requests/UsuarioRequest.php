<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            "nome_acesso" => "required",
            "senha_acesso" => "required",
        ];
    }
    
    public function messages()
    {
        return [
            "nome_acesso.required" => "Favor preencher o nome do usuário",
            "senha_acesso.required" => "Favor preencher a a senha do usuário"
        ];
    }
}