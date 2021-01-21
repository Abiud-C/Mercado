<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\LoginController;
use App\User;
use Illuminate\Support\Facades\Auth;
//use App\Auth;
use App\Role;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        //
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
    public function store(RegistroRequest $request)
    {
        //

        $role_vendedro = Role::where('Nombre','=','Vendedor')->first();
        $role_comprador = Role::where('Nombre','=','Comprador')->first();

        if($request->hasfile('foto')){

            $foto=$request->file('foto')->store('img/users','public');
        }
        $user = User::create([
            'name' => $request['name'],
            'paterno' => $request['paterno'],
            'materno' => $request['materno'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'foto' => $foto,
        ]);

        $user->roles()->attach($role_vendedro);
        $user->roles()->attach($role_comprador);

        Auth::login($user);
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
        $user= User::findOrFail($id);
        $user->roles; 
        return Response()->json($user);
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
        $user = User::find($id);
        if ($user != null){
            try{ 
                $user->name = $request->name;
                $user->paterno = $request->paterno;
                $user->materno = $request->materno;
                $user->email = $request->email;
                $user->save();
                return response()->json($user->toArray() , 200) ; 
            }catch(Exception $exception)
            {
                if ($exception instanceof \Illuminate\Database\QueryException) {    
                    if( $request->expectsJson()){
                        return response()->json(  $exception->getMessage(), 501) ;  
                    }
                }   
            }
        }else{
            return response()->json("Usuario no encontrado.", 404) ;  
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
