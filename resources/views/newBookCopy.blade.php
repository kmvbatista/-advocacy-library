@extends('layout.app', ["current"=>"bookCopies" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <h2>Cadastro de exemplar</h2>
        <form action="/bookCopy/create/{{$book->id}}" method="POST">
        @csrf
            <div class="form-group">
                <h3>{{$book->name}}</h3>
                <label for="acquisitionDate">Data de aquisição</label>
                <input type="date" class="form-control" name="acquisitionDate" id="acquisitionDate" placeholder="Data de aquisição">
                <label for="papricePaidid">Preço pago</label>
                <input type="text" class="form-control" name="pricePaid" id="pricePaid" placeholder="Preço pago">
               
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a href="/" class="btn btn-danger btn-sm">Cancelar</a>
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