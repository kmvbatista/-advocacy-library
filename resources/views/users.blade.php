@extends('layout.app', ["current"=>"users" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de usuários</h5>

        @if(count($users) > 0)
        <table class="table table-ordered table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->employee->Name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="/users/edit/{{$user->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/users/delete/{{$user->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
<div class="card-footer">
<a href="/employees" class="btn btn-sm btn-primary" role="button">Novo usuário</a>
</div>
</div>
@endsection