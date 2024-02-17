@extends('template.painel')
@section('title', 'Edição de Contato')
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edição de Contato</h5>

            <!-- General Form Elements -->
            <form method="post" action="{{route('contato.edita',$contato->id)}}">
                @csrf
                @method("put")
                <input type="hidden" value="{{$contato->pessoa_id}}" name="codigo_pessoa"/>
                
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Pais</label>
                        <select name="countrycode">
                            <option value="{{$contato->countrycode}}"></option>
                            @foreach($paises as $pais)
                                @if($pais["call_code"] === $contato->countrycode)
                                    <option value="{{$contato->countrycode}}" selected>{{$pais["nome_pais"]}}</option>        
                                @else
                                    <option value="{{$pais["call_code"]}}">{{$pais["nome_pais"]}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error("countrycode")
                        <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                        <label for="inputText" class="col-sm-2 col-form-label">Codigo Pais</label>
                        <input type="text" class="form-control" name="numero" value="{{$contato->numero}}"/>
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
                        <button type="submit" class="btn btn-primary mb-4">Alterar</button><br>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection