@extends('layouts.app')
@section('content')
 <div class="container text-center">
      <div class="jumbotron mensaje">
		  <h1 class="display-4">HOLA, {{ Auth::user()->name }}</h1>
		  <p class="lead">Para poder continuar primero debes crear categorias, en cual seran tus que haceres de cada día</p>
		  <hr class="my-4">
		  <p>como ejemplo de algunas categorias serian: Personal, Compras, Trabajo y etc, ya tu decides cual va hacer el nombre de la categoría</p>
		  <p class="lead">
		    <a class="btn btn-info btn-lg" href="{{route('categoria.create')}}" role="button">Continuar</a>
		  </p>
		</div>
  </div>
@endsection