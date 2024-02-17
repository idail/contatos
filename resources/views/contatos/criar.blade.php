@extends('template.painel')
@section('title', 'Cadastro de Contato')
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Contato</h5>

            <!-- General Form Elements -->
            <form method="post" action="{{route('contato.cadastramento')}}">
                @csrf
                
                <input type="hidden" value="{{$codigo_pessoa_recebido}}" name="codigo_pessoa"/>
                
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Pais</label>
                        <select name="countrycode">
                            @foreach($paises as $pais)
                            <option value="{{$pais["call_code"]}}">{{$pais["nome_pais"]}}</option>
                            @endforeach
                        </select>
                        @error("countrycode")
                        <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                        <label for="inputText" class="col-sm-2 col-form-label">Codigo Pais</label>
                        <input type="text" class="form-control" name="numero"/>
                        @error("numero")
                        <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary mb-4">Cadastrar</button><br>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection