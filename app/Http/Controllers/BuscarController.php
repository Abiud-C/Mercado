<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class BuscarController extends Controller
{
    //
    public function Buscar(Request $request)
    {
    	$Buscar = $request->get('Buscar');
    	$querys = Producto::where('Nombre','LIKE', '%'.$Buscar.'%')->get();
    	$data = [];
    	foreach ($querys as $query) {
    		$data[] =[
    			'label' => $query->Nombre
    		];
    	}
    	return $data;
    }
}
