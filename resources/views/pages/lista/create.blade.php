@extends('layouts.app')
@section('content')
 <div class="col-md-8" >
     
            <div class="header">
                <h4 class="title">CREAR TAREA </h4>
            </div>
             @if (count($errors) > 0)
                @include('pages.partials.errors')
            @endif
            <div class="content">
                 {!! Form::open(['route'=>'lista.store']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>CATEGORÍA *</label>
                              {!! Form::select('categoria_id', $categoria, null, ['class' => 'form-control selectpicker', 'data-live-search'=>'true']) !!}
                            </div>
                          </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>NOMBRE</label>
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

                            <div class="col-md-4">
                            <div class="form-group">
                            <label>FECHA</label>
                                {!! 
                                    Form::date(
                                        'fecha', 
                                         null,
                                        array(
                                            'class'=>'form-control',
                                            'min' => Date::now()->toDateString()
                                        )
                                    ) 
                                !!}
                              </div>
                            </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                            <div class="form-group">
                            <label>DESCRIPCIÓN</label>
                                {!! 
                                    Form::textarea(
                                        'descripcion', 
                                         null,
                                        array(
                                            'class'=>'form-control',
                                            'autofocus' => 'autofocus', 
                                            'placeholder' => 'ESCRIBE LA DESCRIPCIÓN'
                                        )
                                    ) 
                                !!}
                              </div>
                            </div>

                            <div class="col-md-12">
                            
                             <div class="form-group">
                                {!! Form::submit('CREAR TAREA', array('class'=>'btn btn-info btn-fill pull-right')) !!}
                             </div>
                           
                            </div>
                    </div>

                  
                    <div class="clearfix"></div>
                 {!! Form::close() !!}
            </div>
    </div>
@endsection