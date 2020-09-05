@extends('layout.app', ["current"=>"clientes" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/employees" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Nome do Funcionário</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                <label for="registration">Matricula</label>
                <input type="text" class="form-control" name="registration" id="registration" placeholder="Matricula">
                <label for="OABCode">Código OAB(Não obrigatório)</label>
                <input type="text" class="form-control" name="OABCode" id="OABCode" placeholder="Código OAB">
               
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a href="/employees" class="btn btn-danger btn-sm">Cancelar</a>
            @if(isset($errors))
                <div class="card-footer">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif
        </form>
    </div>
</div>
@endsection