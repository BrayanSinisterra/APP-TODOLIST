<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Categorias;
use App\Lista_Tarea;
use Illuminate\Support\Facades\Input;
class CategoriaController extends Controller
{
  public function index(){
    $usuario_id =   Auth::user()->id;
    $categorias = Categorias::where('usuario_id', $usuario_id)->get();
    return view('pages.categoria.index', compact('categorias'));
  }  

  public function create(){
  	return view('pages.categoria.create');
  }

  public function store(Request $request){
  	     $this->validate($request,[
          'nombre' => 'required'
        ]);
  	     $categoria = Categorias::create([
            'nombre'     => $request->get('nombre'),
            'usuario_id' => Auth::user()->id
        ]);
  	    $message = $categoria ? 'Categoría agregada correctamente!' : 'La Categoría NO pudo agregarse!';
        return redirect()->route('categoria.index')->with('message', $message);
  }

  public function show(Categorias $categoria){
    return $categoria;
  }

  public function edit(Categorias $categoria){
  	return view('pages.categoria.edit', compact('categoria'));
  }

  public function update(Request $request, Categorias $categoria){
  	    $this->validate($request,[
          'nombre' => 'required'
        ]);
        $categoria->fill($request->all());
        $updated = $categoria->save();
        $message = $updated ? 'Categoría actualizada correctamente!' : 'La Categoría NO pudo actualizarse!';
        return redirect()->route('categoria.index')->with('message', $message);
  }

  public function destroy(Categorias $categoria){
    $deleted = $categoria->delete(); 
    $message = $deleted ? 'Categoría eliminada correctamente!' : 'La Categoría NO pudo eliminarse!';
  }
  
  public function cat_list($id){
    $lista  = Lista_Tarea::where('categoria_id', $id)->where('activo', 0)->get();
    return view('pages.categoria.cat_list', compact('lista'));
  }

}
