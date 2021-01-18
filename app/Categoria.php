<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Categoria extends Model
{
    //
    protected $table ="categorias"; 
    protected $fillable = [
        'NameCate',
        'Description',
        'Status',
	];    

	public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
