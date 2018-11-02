<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Categorias;
use App\Lista_tarea;
use App\Http\Requests\RequestLista;
use Illuminate\Support\Facades\Input;
use Jenssegers\Date\Date;
use Response;
class ListaController extends Controller
{
    public function index(){
     $usuario_id =   Auth::user()->id;
     $lista = Lista_tarea::where('usuario_id', $usuario_id)->where('activo', 0)->orderBy('created_at', 'desc')->get();
     return view('pages.lista.index', compact('lista'));
    }

    public function create(){
    	$usuario_id =   Auth::user()->id;
    	$categoria = Categorias::where('usuario_id', $usuario_id)
      ->orderBy('id', 'asc')->lists('nombre', 'id');
    	return view('pages.lista.create', compact('categoria'));
    }

    public function store(RequestLista $request){
      $usuario_id =   Auth::user()->id;

      $data = [
        'nombre'		=> $request->get('nombre'), 
        'descripcion' 	=> $request->get('descripcion'), 
        'fecha'			=> $request->get('fecha'), 
        'categoria_id'  => $request->get('categoria_id'),
        'usuario_id'	=> $usuario_id
      ];
      $create = Lista_tarea::create($data);
      $message = $create ? 'Se ha agregado correctamente la tarea!' : 'La tarea NO pudo agregarse!';
      return redirect()->route('lista.index')->with('message', $message);
    }

    public function show(Lista_tarea $lista){
      return $lista;
    }

    public function edit(Lista_tarea $lista){
      $usuario_id =   Auth::user()->id;
      $categoria = categorias::where('usuario_id', $usuario_id)
      ->orderBy('id', 'asc')->lists('nombre', 'id');
      return view('pages.lista.edit', compact('categoria', 'lista'));
    }

    public function update(Lista_tarea $lista, RequestLista $request){
        $lista->fill($request->all());
        $updated = $lista->save();
        $message = $updated ? 'Se ha actualizada correctamente!' : 'NO se pudo actualizar!';
        return redirect()->route('lista.index')->with('message', $message);
    }

   public function destroy(Lista_tarea $lista){
    $deleted = $lista->delete(); 
    $message = $deleted ? 'Se ha eliminada correctamente!' : 'NO pudo eliminarse!';
    return redirect()->route('lista.index')->with('message', $message);
  }

  public function completado($id){ 
    $lista =  Lista_tarea::findOrFail($id);
    $lista->activo =  1;
    $lista->fecha_completo  =  Date::now()->toDateString();
    $lista->save(); 
    return redirect()->route('lista.index');
  }

  public function reactivar($id){
    $lista =  Lista_tarea::findOrFail($id);
    $lista->activo =  0;
    $lista->save(); 
    return redirect()->route('lista.index');
  }

  public function vista_completo(){
     return view('pages.lista.fecha');
  }

  public function act_completo(){
    if(isset($_GET["fecha_1"]) and isset($_GET["fecha_2"])){
    $fecha1 = htmlspecialchars(input::get("fecha_1")); 
    $fecha2 = htmlspecialchars(input::get("fecha_2")); 
    $usuario_id =   Auth::user()->id;
    $lista =  Lista_tarea::where('usuario_id', $usuario_id)
    ->where('activo', 1)
    ->where('fecha_completo','>=',$fecha1)
    ->where('fecha_completo', $fecha2)->get();
    return view('pages.lista.act_completas', compact('lista'));
   }
    }

  public function autocomplete(){
  $term = Input::get('term');
  
  $results = array();
  
  $queries = Lista_tarea::where('nombre', 'LIKE', '%'.$term.'%')->get();
  
  foreach ($queries as $query)
  {
      $results[] = [ 'id' => $query->id, 'value' => $query->nombre];
  }
return Response::json($results);
}


public function busquedad(){
  if(isset($_GET["dato"])){
    $dato = htmlspecialchars(input::get("dato")); 
    $usuario_id =   Auth::user()->id;
    $lista = Lista_tarea::where('usuario_id', $usuario_id)->where('activo', 0)->where('nombre', 'LIKE', '%'.$dato.'%')->get();
 }else{
    $lista = Lista_tarea::where('usuario_id', $usuario_id)->where('activo', 0)->orderBy('created_at', 'desc')->get();
  }

  return view('pages.lista.index', compact('lista'));

}

}
