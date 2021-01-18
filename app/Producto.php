<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table ="productos"; 
    protected $fillable = [
        'Nombre',
        'Caracteristicas',
        'Descripcion',
        'Garantia',
        'Cantidad',
        'Precio',
        'Estatus',
        'categoria_id',
        'user_id',
	];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function fotos()
    {
        return $this->hasMany('App\Foto');
    }
}
