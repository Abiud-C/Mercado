<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use App\Categoria;
use App\Producto;
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $request->user()->authorizeRoles('Supervisor');
        $Categoria = Categoria::all();
        return view('categorias.IndexCategorias',compact('Categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {       
        try {
            $categoria = new Categoria();
            $categoria->fill($request->all());
            $categoria->save();
            return $request->expectsJson()? response()->json( $categoria->toArray(), 200): "agregado" ;
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
        /*/*muestra los productos de la categoria seleccionada
        $categoria =  Categoria::find($id);
        $Categoria = Categoria::all();
        //$productos = $categoria->productos()->where('Estatus',1)->get();
        $productos = DB::table('categorias')->join('productos','productos.categoria_id','=','categorias.id')->join('fotos','fotos.producto_id','=','productos.id')->where('productos.Estatus',1)->where('categorias.id',$id)->select('categorias.*','productos.*','fotos.File_Name')->get();
        //return dd($productos);
        return view('categorias.showCategorias',compact('productos','Categoria','categoria'));*/
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
        $categoria= Categoria::findOrFail($id); 
        return Response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, $id)
    {
        //
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        if ($categoria != null){
            try{        
                $categoria->save();
                return response()->json($categoria->toArray() , 200) ; 
            }catch(Exception $exception)
            {
                if ($exception instanceof \Illuminate\Database\QueryException) {    
                    if( $request->expectsJson()){
                        return response()->json(  $exception->getMessage(), 501) ;  
                    }
                }   
            }
        }else{
            return response()->json("categoria no encontrada.", 404) ;  
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
        $categoria = Categoria::find($id);
        if ($categoria != null){
            try{        
                $categoria->delete();
                return response()->json(  $categoria->toArray() , 200) ; 
            }catch(Exception $exception)
            {
                if ($exception instanceof \Illuminate\Database\QueryException) {    
                    if( $request->expectsJson()){
                        return response()->json(  $exception->getMessage(), 501) ;  
                    }
                }   
            }
        }else{
            return response()->json(  "Categoria no encontrada.", 404) ;  
        }
        
    }
}
