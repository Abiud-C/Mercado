<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Producto;
use App\User;
use DB;
use Auth;

class PreguntarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $User = Auth::user();
        $Pregunta = DB::table('preguntas')->join('productos','productos.id','=','preguntas.producto_id')->join('users','users.id','=','preguntas.user_id')->where('productos.user_id',$User->id)->get();

        return $Pregunta;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //se genera la respuesta para el producto
        return 'hola';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //sección para craer la pregunta
        return response($request);
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
        $Pregunta = Pregunta::findOrFail($id)->join('users','users.id','=','preguntas.user_id')->first();

        return Response()->json($Pregunta);
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
        $user = Auth::user()->id; 
        try {
           
            $pregunta = Pregunta::create([
                'contenido' => $request['contenido'],
                'estatus' => 0,
                'producto_id' => $id,
                'user_id' => $user,
            ]);
            
            return $request->expectsJson()? response()->json( $pregunta->toArray(), 200): "agregado" ;
            } catch (Exception $exception) {
                    if ($exception instanceof \Illuminate\Database\QueryException) {    
                        if($request->expectsJson()){
                            return response()->json($exception->getMessage(), 501);  
                        }
                    }    
                }
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
