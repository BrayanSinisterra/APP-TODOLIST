@extends('layouts.app')
@section('content')

<div class="col-md-12 ">
 

     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">FECHA ACTIVIDAD</th>
      <th scope="col">FECHA CREACIÓN</th>
      <th scope="col">FECHA COPLETADO</th>
      <th scope="col">ELIMINAR</th>

    </tr>
  </thead>
  <tbody>
  <!--{{ $i = 0 }}-->
  @foreach($lista as $data)  
  <!---{{$i++}} -->
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$data->nombre}}</td>
      <td>{{$data->descripcion}}</td>
      <td>{{Date::parse($data->fecha)->format('Y-m-d')}}</td>
      <td>{{Date::parse($data->created_at)->diffForHumans()}}</td>
      <td>{{Date::parse($data->fecha_completado)->diffForHumans()}}</td>
      <td><a href="{{url('reactivar-tarea', $data->id)}}" class="btn btn-success">RESTAURAR</a></td>
      <td>{!! Form::open(['route' => ['lista.destroy', $data->id]]) !!}
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

@stop