@extends('layouts.app')
@section('content')
  <div class="col-md-8">
  	
  <div class="header">
               <h4 class="title">LISTA DE CATEGORÍAS CREADAS </h4>
         <a href="{{route('categoria.create')}}" class="btn btn-info"> CREAR NUEVA CATEGORÍA</a>

           <a href="{{route('lista.index')}}" class="btn btn-warning"> IR A LISTA DE TAREAS</a>
  </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">FECHA CREACÍON</th>
      <th scope="col">TAREAS</th>
      <th scope="col">EDITAR</th>
      <th scope="col">ELIMINAR</th>

    </tr>
  </thead>
  <tbody>
  <!--{{ $i = 0 }}-->
  @foreach($categorias as $data)  
  <!---{{$i++}} -->
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$data->nombre}}</td>
      <td>{{Date::parse($data->created_at)->diffForHumans()}}</td>
      <td><a href="{{route('categoria.edit', $data->id)}}" class="btn btn-success">EDITAR</a></td>
      <td><a  href="{{url('cat-list', $data->id)}}" class="btn btn-warning">LISTA DE TAREAS</a></td>
      <td>{!! Form::open(['route' => ['categoria.destroy', $data->id]]) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                          <i class="fas fas-trash-o"> X </i>
                        </button>
                      {!! Form::close() !!}</td>
    </tr>
  @endforeach
  </tbody>
</table>
  </div>
@endsection