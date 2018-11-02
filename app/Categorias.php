<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';
	protected $fillable = ['nombre', 'usuario_id'];
	public $timestamps = true;  
    public function Lista()
    {
        return $this->hasMany('App\Lista_tarea');
    }
}
