<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Respuesta;
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
        //sección para craer la respuesta
        $user = Auth::user()->id; 
        try {
           
            $respuesta = Respuesta::create([
                'Contenido' => $request['Contenido'],
                'pregunta_id' => $request['id'],
                'user_id' => $user,
            ]);

            $pregunta = Pregunta::find($request->id);
            $pregunta->estatus = 1;
            $pregunta->save();
            
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //funcion que consulta la pregunta para mostrarlo en el modal
        $Pregunta = Pregunta::findOrFail($id);
        $Pregunta->user;
        $Pregunta->producto->fotos;
        return Response()->json($Pregunta);
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


}
