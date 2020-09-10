@extends('layout.app', ["current"=>"books" ])

@section('body')
<div class="card border">
    <div class="card-body">
        
        @if(count($bookCopies) > 0)
        <h5 class="card-title">Exemplares de {{$bookCopies[0]->book->name}}</h5>
        <table class="table table-ordered table-hover">
            <thead>
            <tr>
                <th>Preço pago</th>
                <th>Data de aquisição</th>
            </tr>
        </thead>
            <tbody>
            @foreach($bookCopies as $bookCopy)
                <tr>
                    <td>{{$bookCopy->pricePaid}}</td>
                    <td>{{$bookCopy->acquisitionDate}}</td>
                    <td>
                        <a href="/loans/{{$bookCopy->id}}" class="btn btn-sm btn-primary">Fazer empréstimo</a>
                        <a href="/bookCopy/delete/{{$bookCopy->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        @if(count($bookCopies) == 0)
            <h3>Não há cópias desse livro cadastradas no momento</h3>
        @endif
    </div>
<div class="card-footer">
</div>
</div>
@endsection