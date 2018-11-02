<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Categorias;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }


    public function index()
    {
        $usuario_id =   Auth::user()->id;
        $categorias = Categorias::where('usuario_id', $usuario_id)->get();
         if (count($categorias) > 0) {
            return redirect()->route('lista.index');
         }else{
            return view('pages.partials.mensaje_categoria');
         }    
    }
}
