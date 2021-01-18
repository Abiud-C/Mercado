<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    //
    protected $table ="domicilios"; 
    protected $fillable = [
        'Numero',
        'CP',
        'calle',
        'colonia',
        'referencia',
	];

	public function users(){

		return $this->belongsTo('App\User');
		
	}
}
