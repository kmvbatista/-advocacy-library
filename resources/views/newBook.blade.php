@extends('layout.app', ["current"=>"clientes" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/books" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                <label for="author">Autor</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="Autor">
                <label for="area">Area</label>
                <input type="text" class="form-control" name="area" id="area" placeholder="Área">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a href="/books" class="btn btn-danger btn-sm">Cancelar</a>
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