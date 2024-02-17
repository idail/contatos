@extends('template.painel')
@section('title', 'Detalhes de Pessoa')
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalhes da Pessoa</h5>

            <!-- General Form Elements -->
            <form method="post">
                
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{$pessoa->nome}}" disabled>
                    </div>
                </div>
        
        
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$pessoa->email}}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                    <div class="col-lg-2">
                        <a href="{{route('buscar.pessoas')}}" class="btn btn-primary">Retornar</a>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection