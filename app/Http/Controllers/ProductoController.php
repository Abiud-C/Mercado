<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Producto;
use App\Categoria;
use App\Pregunta;
use App\Foto;
use Auth;
use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$Producto = Producto::all();
        //return view('productos.IndexProductos',compact('Producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::where('Status', '=', 1)->get();
        return view('productos.Create_Productos.CreateProductos',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {   
        $user = Auth::user()->id; 
        if($request->hasfile('foto')){

            $file = $request->file('foto')->store('img/productos','public');
        }
        $Categoria = Categoria::where('id','=' ,$request->Categoriaid);
        $datosProducto = Producto::create([
                'Nombre' => $request['Nombre'],
                'Caracteristicas' => $request['Caracteristicas'],
                'Descripcion' => $request['Descripcion'],
                'Garantia' => $request['Garantia'],
                'Cantidad' => $request['Cantidad'],
                'Precio' => $request['Precio'],
                'Estatus' => 0,
                'categoria_id'=>$request['Categoriaid'],
                'user_id'=> $user,
                ]);
        
        $Foto = Foto::create([
                'File_Name' => $file,
                'Descripcion' => $request['Descripcion_foto'],
                'producto_id' => $datosProducto->id,
                'user_id' => $user,
        ]);

        return redirect('Cliente')->with('Mensaje','Producto enviado a revisión con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //esta funcion muestra el producto que se clicklea en el catalogo de productos
        $Vista_Producto = Producto::findOrFail($id);
        $Foto_Producto = Foto::where('producto_id','=',$id)->first();
        $Vista_Producto->categoria->first();
        $Categoria = Categoria::where('Status', '=', 1)->get();
        $Pregunta = DB::table('preguntas')->join('respuestas','respuestas.pregunta_id','preguntas.id')->where('preguntas.producto_id',$id)->get();
        //return dd($Vista_Producto);
        return view('productos.VentaProducto',compact('Vista_Producto','Categoria','Foto_Producto','Pregunta'));
    }
    /**
    *Este metodo devuelve al encargado los datos del producto a revisar en un formato json
    */
    public function GetVistaProducto($id)
    {
        $Vista_Producto = Producto::findOrFail($id);
        $Vista_Producto->fotos->first();
        $Vista_Producto->categoria->first();
        return response()->json($Vista_Producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //este metodo es usado por el usuario vendedor
        $categoria = Categoria::where('Status', '=', 1)->get();
        $producto = Producto::findOrFail($id);
        $producto->fotos->first();
        $producto->categoria->first();
        //return dd($producto);
        return view('productos.Create_Productos.EditProductos',compact('producto','categoria'));
    }

    /**
    Este metodo actualiza el estado del producto puesto en revisión
    */
    public function updateEstado(Request $request, $id)
    {   
        $Estatus = Producto::where('id','=',$id);
        $Estatus->where("Estatus", 0)->update(["Estatus" => $request->Estatus]);
        return response()->json($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ProductoRequest $request, $id)
    {
        // 
        try {

            if($request->hasfile('foto')){

            $file = $request->file('foto')->store('img/productos','public');
            }
        $Categoria = Categoria::where('id','=' ,$request->Categoriaid);
        $datosProducto = Producto::where('productos.id',$id)->update([
                'Nombre' => $request['Nombre'],
                'Caracteristicas' => $request['Caracteristicas'],
                'Descripcion' => $request['Descripcion'],
                'Garantia' => $request['Garantia'],
                'Cantidad' => $request['Cantidad'],
                'Precio' => $request['Precio'],
                'categoria_id'=>$request['Categoriaid'],
                ]);
        
        $Foto = Foto::where('fotos.producto_id',$id)->update([
                'File_Name' => $file,
                'Descripcion' => $request['Descripcion_foto'],
        ]);

        return redirect('Cliente');
            
        } catch (Exception $e) {
            return error_log('Erro',$e);
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
