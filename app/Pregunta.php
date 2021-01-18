<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $table ="preguntas"; 
    protected $fillable = [
        'contenido',
        'estatus',
        'producto_id',
        'user_id',
	];

	public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function respuesta()
    {
        return $this->hasOne('App\Respuesta');
    }
}
