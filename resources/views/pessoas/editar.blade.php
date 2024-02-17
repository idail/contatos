@extends('template.painel')
@section('title', 'Edição de Pessoa')
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edição de Pessoa</h5>
            
            <!-- General Form Elements -->
            <form method="post" action="{{route('pessoa.edita',$pessoa->id)}}">
                @csrf
                @method("put")
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{$pessoa->nome}}">
                        @error("nome")
                        <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror

                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$pessoa->email}}">
                        @error("email")
                        <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary mb-4">Alterar</button><br>
                        {{--@if($mensagem = session()->get("sucesso"))
                        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                            {{$mensagem}}
                        </div>
                        @endif--}}
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection