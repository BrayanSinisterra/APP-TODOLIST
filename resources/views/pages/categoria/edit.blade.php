@extends('layouts.app')
@section('content')
 <div class="col-md-8" >
     
            <div class="header">
                <h4 class="title">CREAR CATEGORÍA </h4>
            </div>
             @if (count($errors) > 0)
                @include('pages.partials.errors')
            @endif
            <div class="content">
                  {!! Form::model($categoria, [
                      'method' => 'PATCH',
                      'route' => ['categoria.update', $categoria]
                  ]) !!}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                {!! 
                                    Form::text(
                                        'nombre', 
                                         null,
                                        array(
                                            'class'=>'form-control',
                                            'autofocus' => 'autofocus', 
                                            'placeholder' => 'ESCRIBE EL NOMBRE DE LA CATEGORÍA'
                                        )
                                    ) 
                                !!}
                              </div>
                            </div>
                        <div class="col-md-2">
                            
                             <div class="form-group">
                                {!! Form::submit('EDITAR CATEGORIA', array('class'=>'btn btn-info btn-fill pull-right')) !!}
                             </div>
                           
                        </div>
                    </div>
                    <div class="clearfix"></div>
                 {!! Form::close() !!}
            </div>
    </div>
@endsection