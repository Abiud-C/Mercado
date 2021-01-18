<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    //
    protected $table = 'respuestas';
    protected $fillable = [
    	'Contenido',
    	'pregunta_id',
    	'user_id',
    ];

    public function pregunta()
    {
    	return $this->belongsTo('App\Pregunta');
    }
}
