@extends('layouts.app')
@section('content')
  <div class="col-md-8">
  	
  <div class="header">
               <h4 class="title">LISTA DE TAREAS POR REALIZAR </h4>
         <a href="{{route('lista.create')}}" class="btn btn-info"> CREAR NUEVA TAREA</a>
         <a href="{{url('completado-list')}}" class="btn btn-warning"> TAREAS COMPLETADAS</a>
         <a href="{{route('categoria.index')}}" class="btn btn-success"> IR A CATEGORIAS</a> <br><br>
         
         <div class="row">        
          <div class="col-md-6">
           <div class="form-group ">
          
           {{ Form::open(['action' => ['ListaController@busquedad'], 'method' => 'GET']) }}

              {{ Form::text('dato', '', ['id' =>  'q', 'placeholder' =>  'BUSCADOR', 'class' => 'form-control buscador',])}}
            </div>
            </div>

            <div class="col-md-6">
           <div class="form-group ">
              {{ Form::submit('BUSCAR', array('class' => 'btn btn-success submit')) }}
              {{ Form::close() }}
          
              
            </div>
          </div>
            <script>
              $(function(){
             $( "#q" ).autocomplete({
              source: "search/autocomplete",
              minLength: 3,
              select: function(event, ui) {
                $('#q').val(ui.item.value);
              }
            });
          });
            </script>
          </div> 
  
  </div>
  @include('pages.partials.tabla_lista')
  </div>



 

@endsection


