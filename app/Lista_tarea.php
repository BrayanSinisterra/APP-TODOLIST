<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista_tarea extends Model
{
    protected $table = 'lista_tareas';
	protected $fillable = ['nombre', 'descripcion', 'activo', 'fecha','fecha_completo', 'categoria_id', 'usuario_id'];
	public $timestamps = true;  
    public function Categoria()
    {
        return $this->belongsTo('App\Categorias');
    }
}
