@extends('template.painel')
@section('title', 'Listagem de Pessoas')
@section('content')
    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="{{route('pessoa.cadastro')}}" class="btn btn-primary">Cadastrar Pessoa</a>
            <a href="{{ route('usuarios.login') }}" class="btn btn-primary">Autenticar</a>
        </div>
    </div>



    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pessoas</h5>
            <!-- Default Table -->
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col" colspan="2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pessoas as $dados)
                        <tr>
                            <td>{{ $dados->nome }}</td>
                            <td>{{ $dados->email }}</td>
                                 <td>
                                    <a href="{{route('pessoas.detalhes',$dados->id)}}"><i class="bi bi-binoculars fs-3"
                                            title="Visualizar Pessoa" style="margin-inline-end: 10%;"></i></i></a>
                                    <a href="{{route('contato.cadastro',$dados->id)}}"><i class="bi bi-person-lines-fill fs-3"
                                            title="Cadastrar Contato" style="margin-inline-end: 10%;"></i></i></a>
                            @if (session()->has('nome_usuario'))
                                    <a href="{{route('pessoa.exibi_edicao',$dados->id)}}"><i
                                            class="bi bi-pencil-square fs-3" title="Editar Pessoa"
                                            style="margin-inline-end: 10%;"></i></a>
                                    <a href="{{route('pessoa.deletar',$dados->id)}}"><i class="bi bi-trash fs-3"
                                            title="Excluir Pessoa"></i></a>
                            @endif
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>





    <div class="modal fade" id="deletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir esse registro?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                   @if (!empty($codigo_recebido))
                        <form method="POST" action="{{ route('pessoa.exclusao', $codigo_recebido) }}">
                    @endif
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    @if (!empty($codigo_recebido))
        <script>
            $(document).ready(function(e) {
                $("#deletar").modal("show");
            });
        </script>
    @endif

@endsection