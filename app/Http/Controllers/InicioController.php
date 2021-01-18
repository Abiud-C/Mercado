<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use App\Producto;
use App\User;
use App\Role;
use App\Foto;
use DB;



class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Categoria = Categoria::where('Status','=',1)->get();
        $Productos = DB::table('fotos')->join('productos','productos.id','=','fotos.producto_id')->where('Estatus',1)->get();
        return view('Inicio',compact('Categoria','Productos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categoria =  Categoria::find($id);
        $Categoria = Categoria::all();
        //$productos = $categoria->productos()->where('Estatus',1)->get();
        $productos = DB::table('categorias')->join('productos','productos.categoria_id','=','categorias.id')->join('fotos','fotos.producto_id','=','productos.id')->where('productos.Estatus',1)->where('categorias.id',$id)->select('categorias.*','productos.*','fotos.File_Name')->get();
        //return dd($productos);
        return view('categorias.showCategorias',compact('productos','Categoria','categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
