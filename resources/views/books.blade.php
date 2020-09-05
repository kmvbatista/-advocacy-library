@extends('layout.app', ["current"=>"books" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Livros</h5>

        @if(count($books) > 0)
        <table class="table table-ordered table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Autor</th>
                <th>Área</th>
            </tr>
        </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->name}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->area}}</td>
                    <td>
                        <a href="/loans/{{$book->id}}" class="btn btn-sm btn-primary">Fazer empréstimo</a>
                        @if(Session::get('user')->isAdmin)
                            <a href="/bookCopy/create/{{$book->id}}" class="btn btn-sm btn-primary">Cadastrar exemplar</a>
                            <a href="/bookCopy/list/{{$book->id}}" class="btn btn-sm btn-primary">Ver exemplares</a>
                            <a href="/books/delete/{{$book->id}}" class="btn btn-sm btn-danger">Apagar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
<div class="card-footer">
@if(Session::get('user')->isAdmin)

<a href="/books/create" class="btn btn-sm btn-primary" role="button">Novo livro</a>
@endif
</div>
</div>
@endsection