@extends('layout.app', ["current"=>"loans" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/loans/{{$bookCopy->id}}" method="POST">
        @csrf
          @if($bookCopy)
            <div class="form-group">
                <label for="name">Nome do livro</label>
                <input type="text" class="form-control" disabled value="{{$bookCopy->book->name}}" name="name" id="name" placeholder="Nome">
                <label for="date">Data de retirada</label>
                <input type="date" class="form-control" name="date" id="date" placeholder="Data de aquisição">
                <label for="pricePaid">Preço pago</label>
                <input type="text" class="form-control" disabled value="{{$bookCopy->pricePaid}}" name="pricePaid" id="pricePaid" placeholder="Preço pago">
                <label for="bookCopyId">Código do exemplar</label>
                <input type="text" name="bookCopyId" id="bookCopyId" class="form-control" disabled value="{{$bookCopy->id}}">
               
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a href="/loans" class="btn btn-danger btn-sm">Cancelar</a>
            @if(isset($errors))
                <div class="card-footer">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif
          @endif
          @if(!$bookCopy)
            <h2>Infelizmente não há exemplares disponíveis</h2>
          @endif
        </form>
    </div>
</div>
@endsection