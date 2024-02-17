<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\ContatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', InicioController::class)->name('inicio');
Route::get("cadastro_pessoa",[PessoaController::class,"cadastro_pessoa"])->name("pessoa.cadastro");
Route::post("cadastramento_pessoa",[PessoaController::class,"cadastramento_pessoa"])->name("pessoa.cadastramento");
Route::get("pessoas/visualizar/{item}",[PessoaController::class,"visualizacao"])->name("pessoas.detalhes");
Route::get("pessoas/edita_pessoa/{item}",[PessoaController::class,"exibir_edicao_pessoa"])->name("pessoa.exibi_edicao");
Route::put("pessoas/edicao/{item}",[PessoaController::class,"edita_pessoa"])->name("pessoa.edita");
Route::get("pessoas/excluir/{item}",[PessoaController::class,"exibir_modal_delecao"])->name("pessoa.deletar");
Route::delete("pessoas/exclusao/{item}",[PessoaController::class,"exclusao_pessoa"])->name("pessoa.exclusao");
Route::get("pessoas",[PessoaController::class,"pessoas"])->name("buscar.pessoas");

Route::get("cadastro_contato/{item}",[ContatoController::class,"cadastro_contato"])->name("contato.cadastro");
Route::post("cadastramento",[ContatoController::class,"cadastramento_contato"])->name("contato.cadastramento");
Route::get("contato/edita_contato/{item}",[ContatoController::class,"exibir_edicao"])->name("contato.exibi_edicao");
Route::put("contato/edita/{item}",[ContatoController::class,"edita"])->name("contato.edita");
Route::get("contato/excluir/{item}",[ContatoController::class,"exibir_modal_delecao"])->name("contato.deletar");
Route::delete("contato/exclusao/{item}",[ContatoController::class,"exclusao_contato"])->name("contato.exclusao");
Route::get("contatos",[ContatoController::class,"contatos"])->name("buscar.contatos");

Route::get('/acesso', [AcessoController::class, 'login'])->name('usuarios.login');
Route::post("pessoas",[AcessoController::class,"autenticar"])->name("usuario.autenticar");
Route::get("/contatos_deslogado",[AcessoController::class,"deslogar"])->name("usuario.deslogar");