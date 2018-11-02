<?php

Route::bind('categoria', function($id){
	return App\Categorias::find($id);
});
Route::bind('lista', function($id){
    return App\Lista_tarea::find($id);
});
Route::auth();
Route::get('/', 'HomeController@index');
Route::resource('categoria', 'CategoriaController');
Route::get('cat-list/{id}', [
     'as'   => 'categoria-lista',
	 'uses' => 'CategoriaController@cat_list'
	 ]);
Route::resource('lista', 'ListaController');
Route::get('completo-tarea/{id}', [
     'as'   => 'tarea-completa',
	 'uses' => 'ListaController@completado'
	 ]);
Route::get('reactivar-tarea/{id}', [
     'as'   => 'reactivar-tarea',
	 'uses' => 'ListaController@reactivar'
	 ]);

Route::get('completado-list', [
     'as'   => 'completo-list',
	 'uses' => 'ListaController@vista_completo'
	 ]);

Route::get('fechas-lista', [
     'as'   => 'lista-fecha',
     'uses' => 'ListaController@act_completo'
   ]);

Route::get('search/autocomplete', 'ListaController@autocomplete');

Route::get('busquedad-lista', [
     'as'   => 'lista-buscar',
     'uses' => 'ListaController@busquedad'
   ]);