<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Pregunta;
use App\User;
use Auth;
use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = Auth::user()->id; 
        $request->user()->authorizeRoles('Vendedor');
        $request->user()->authorizeRoles('Comprador');
        $Usuario = User::find($user);
        $Producto = Producto::where('user_id','=',$user)->get();
        $Pregunta = DB::table('preguntas')->join('productos','productos.id','=','preguntas.producto_id')->join('users','users.id','=','preguntas.user_id')->where('productos.user_id',$user)->select('preguntas.id','preguntas.contenido','preguntas.producto_id','preguntas.user_id','preguntas.created_at','productos.nombre','users.name','users.paterno')->get();
        //return dd($Pregunta);
        return view("Content_Cliente.indexCliente",compact('Producto','Usuario','Pregunta'));
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
