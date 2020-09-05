@extends('layout.app', ["current" => "users"])

@section('body')

<div class="card border">
    <div class="card-body">
- <!--Configurar o actions para chamar o método update-->
        <form action="/users/{{$user->id}}" method="POST">
            @csrf
            <h2>Editar Usuário</h2>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" class="form-control" value="{{$user->email}}" name="email" id="email" placeholder="Email">
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