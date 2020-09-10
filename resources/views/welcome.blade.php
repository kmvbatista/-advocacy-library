@extends('layout.app', ["current"=>"home" ])

@section('body')

<div class="jumbotron bg-light border border-secondary">
   <div class="row">
        <h3>Advocacia do joão</h3>
   </div>
   <div class="row">
   <h4>Bem vindo, {{Session::get('user')->employee->Name}}</h4>
   </div>
</div>

@endsection