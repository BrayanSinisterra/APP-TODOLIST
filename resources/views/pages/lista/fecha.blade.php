@extends('layouts.app')
@section('content')

<div class="col-md-12 ">
    
    <h4>BUSCA EL REGISTRO DE TAREAS </h4>

      {{Form::open(array(
           'action' => 'ListaController@act_completo',
           'method' => 'GET',
           'role' => 'form',
           'class' => 'form-inline'
            ))
         
      }}

       <div class="form-group ">
       <label > DESDE:</label> <br>

      {{Form::date('fecha_1', 'fecha_1', Input::get('fecha_1'), array('class' => 'form-control buscador', 'required'))}}

       </div>

        <div class="form-group ">
        <label > HASTA:</label> <br>
      {{Form::date('fecha_2', 'fecha_2', Input::get('fecha_2'), array('class' => 'form-control buscador', 'required'))}}

       </div>
      <div class="form-group "><br>
       {{Form::input('submit', null, 'GENERAR', array('class' => 'btn btn-success submit'))}}
      </div>
      {{Form::close()}}

</div>

@stop