@extends('layout.app', ["current"=>"myLoans" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Meus empréstimos</h5>
        @if(count($loans) > 0)
        <table class="table table-ordered table-hover">
            <thead>
            <tr>
                <th>Nome do funcionário</th>
                <th>Matrícula do funcionário</th>
                <th>Nome do livro</th>
                <th>Número do exemplar</th>
                <th>Data de retirada</th>
                <th>Status</th>
            </tr>
        </thead>
            <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td>{{$loan->employee->Name}}</td>
                    <td>{{$loan->employee->registration}}</td>
                    <td>{{$loan->bookCopy->book->name}}</td>
                    <td>{{$loan->bookCopy->id}}</td>
                    <td>{{$loan->date}}</td>
                    <td>{{$loan->status}}</td>
                    @if($loan->status =='Pendente' && Session::get('user')->isAdmin)
                        <td>
                            <a href="/loans/finish/{{$loan->id}}" class="btn btn-sm btn-primary">Marcar como entregue</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
<div class="card-footer">
<a href="/books" class="btn btn-sm btn-primary" role="button">Novo empréstimo</a>
</div>
</div>
@endsection