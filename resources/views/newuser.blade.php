@extends('layout.app', ["current"=>"users" ])

@section('body')
<div class="card border">
    <div class="card-body">
    <h3>Cadastrar usuário para funcionário {{$employee->Name}}</h3>
        <form action="/users/create/{{$employee->id}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                <p>Cadastrar como administrador</p>
                <div class="form-control">
                    <label for="sim">Sim</label>
                    <input  id="sim" type="radio" name="isAdmin" value=true>
                    <label for="não">Não</label>
                    <input id="não" type="radio" name="isAdmin" value=false>
                </div>
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Sua senha">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a href="/users" class="btn btn-danger btn-sm">Cancelar</a>
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