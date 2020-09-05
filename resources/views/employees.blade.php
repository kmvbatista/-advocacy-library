@extends('layout.app', ["current"=>"employees" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de funcionários</h5>

        @if(count($employees) > 0)
        <table class="table table-ordered table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Id</th>
                <th>Matrícula</th>
                <th>Código OAB</th>
            </tr>
        </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->Name}}</td>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->registration}}</td>
                    <td>{{$employee->OABCode}}</td>
                    <td>
                        <a href="/employees/edit/{{$employee->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/users/create/{{$employee->id}}" class="btn btn-sm btn-primary">Cadastrar como usuário</a>
                        <a href="/employees/delete/{{$employee->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
<div class="card-footer">
<a href="/employees/create" class="btn btn-sm btn-primary" role="button">Novo funcionário</a>
</div>
</div>
@endsection