<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Models\Pessoa;
use App\Models\Usuario;

class AcessoController extends Controller
{
    public function login()
    {
        return view("acesso.autenticacao");
    }

    public function autenticar(UsuarioRequest $solicitacao_autenticar)
    {
        if (session()->has("nome_usuario")) {
            $registros_pessoas = Pessoa::orderby("id", "asc")->paginate();
            return view("pessoas.index", ["pessoas" => $registros_pessoas]);
        } else {
            $solicitacao_autenticar->validated();
            $recebe_usuario = $solicitacao_autenticar->nome_acesso;
            $recebe_senha = $solicitacao_autenticar->senha_acesso;

            $usuario = Usuario::where("usuario", "=", $recebe_usuario)->where("senha", "=", $recebe_senha)->first();
            if ($usuario) {
                session()->put("nome_usuario", $usuario->nome);
                $registros_pessoas = Pessoa::orderby("id", "asc")->paginate();
                return view("pessoas.index", ["pessoas" => $registros_pessoas]);
            } else {
                session()->flash("dados_errados", "Favor verificar os dados para acesso");
                return redirect()->back();
            }
        }
    }

    public function deslogar()
    {
        session()->forget("nome_usuario");
        $registros_pessoas = Pessoa::orderby("id", "asc")->paginate();
        return view("pessoas.index", ["pessoas" => $registros_pessoas]);
    }
}