<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $table ="fotos"; 
    protected $fillable = [
        'File_Name',
        'Descripcion',
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
}
