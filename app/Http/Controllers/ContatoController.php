<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ContatoRequest;

class ContatoController extends Controller
{
    
    public function cadastro_contato($codigo_pessoa)
    {
        $dados = Http::get("https://restcountries.com/v3.1/all")->json();
        
        $paises = array();
        
        foreach($dados as $valores)
        {
            $valores = ["nome_pais"=>$valores["name"]["official"],"call_code"=>$valores["cca2"]];
            array_push($paises,$valores);
        }
        
        return view("contatos.criar",["paises"=>$paises],["codigo_pessoa_recebido"=>$codigo_pessoa]);
    }
    
    public function cadastramento_contato(ContatoRequest $dados)
    {
        $dados->validated();

        $contato = new Contato();

        $contato->countrycode = $dados->countrycode;
        $contato->pessoa_id = $dados->codigo_pessoa;
        $contato->numero = $dados->numero;

        $contato->save();

        return redirect()->route("buscar.contatos");
    }
    
    public function exibir_edicao($codigo_contato)
    {
        $registro_localizado = Contato::find($codigo_contato);
        
        $dados = Http::get("https://restcountries.com/v3.1/all")->json();
        
        $paises = array();
        
        foreach($dados as $valores)
        {
            $valores = ["nome_pais"=>$valores["name"]["official"],"call_code"=>$valores["cca2"]];
            array_push($paises,$valores);
        }
        
        
        return view("contatos.editar",["paises"=>$paises],["contato"=>$registro_localizado]);
    }

    public function edita(ContatoRequest $dados,$codigo_contato)
    {
        $dados->validated();

        $registro_localizado = Contato::find($codigo_contato);

        $registro_localizado->countrycode = $dados->countrycode;
        $registro_localizado->pessoa_id = $dados->codigo_pessoa;
        $registro_localizado->numero = $dados->numero;

        $registro_localizado->save();    
        return redirect()->route("buscar.contatos");
    }
    
    public function exibir_modal_delecao($codigo_contato)
    {
        $registros_contatos = Contato::orderby('id', 'asc')->paginate();
        return view('contatos.index', ['contatos' => $registros_contatos, 'codigo_recebido' => $codigo_contato]);
    }

    public function exclusao_contato($codigo_contato)
    {
        $registro_localizado = Contato::find($codigo_contato);
        $registro_localizado->delete();
        return redirect()->route('buscar.contatos');
    }
    
    public function contatos()
    {
        $registros_contatos = Contato::orderby("id","asc")->paginate();
        return view("contatos.index",["contatos"=>$registros_contatos]);
    }
}