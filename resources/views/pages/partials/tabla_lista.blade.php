<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">FECHA ACTIVIDAD</th>
      <th scope="col">FECHA CREACIÓN</th>
      <th scope="col">EDITAR</th>
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
      <td><a href="{{url('completo-tarea', $data->id)}}" class="btn btn-success">REALIZADO</a></td>
      <td><a href="{{route('lista.edit', $data->id)}}" class="btn btn-info">EDITAR</a></td>
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