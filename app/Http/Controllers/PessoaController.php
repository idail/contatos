<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\PessoaRequest;

class PessoaController extends Controller
{
    
    public function cadastro_pessoa()
    {
        return view("pessoas.criar");
    }
    
    public function cadastramento_pessoa(PessoaRequest $dados)
    {
        $dados->validated();

        $pessoa = new Pessoa();

        $pessoa->nome = $dados->nome;
        $pessoa->email = $dados->email;

        $pessoa->save();

        return redirect()->route("buscar.pessoas");
    }
    
    public function visualizacao($codigo_pessoa)
    {
        $registro_localizado = Pessoa::find($codigo_pessoa);
        return view("pessoas.visualizar_pessoa",["pessoa"=>$registro_localizado]);
    }
    
    public function exibir_edicao_pessoa($codigo_pessoa)
    {
        $registro_localizado = Pessoa::find($codigo_pessoa);
        return view("pessoas.editar",["pessoa"=>$registro_localizado]);
    }

    public function edita_pessoa(PessoaRequest $dados,$codigo_pessoa)
    {
        $dados->validated();

        $registro_localizado = Pessoa::find($codigo_pessoa);

        $registro_localizado->nome = $dados->nome;
        $registro_localizado->email = $dados->email;

        $registro_localizado->save();    
        return redirect()->route("buscar.pessoas");
    }
    
    public function exibir_modal_delecao($codigo_pessoa)
    {
        $registros_pessoas = Pessoa::orderby('id', 'asc')->paginate();
        return view('pessoas.index', ['pessoas' => $registros_pessoas, 'codigo_recebido' => $codigo_pessoa]);
    }

    public function exclusao_pessoa($codigo_pessoa)
    {
        $registro_localizado = Pessoa::find($codigo_pessoa);
        $registro_localizado->delete();
        return redirect()->route('buscar.pessoas');
    }
    
    public function pessoas()
    {
        $registros_pessoas = Pessoa::orderby("id","asc")->paginate();
        return view("pessoas.index",["pessoas"=>$registros_pessoas]);
    }
}