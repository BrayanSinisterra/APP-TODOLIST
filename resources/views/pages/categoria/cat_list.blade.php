@extends('layouts.app')
@section('content')
  <div class="col-md-8">
  	
  <div class="header">
               <h4 class="title">LISTA DE TAREAS POR CATEGORÍA </h4>
         <a href="{{route('categoria.index')}}" class="btn btn-info"> VOLVER</a>
  </div>
      @include('pages.partials.tabla_lista')
  </div>
@endsection