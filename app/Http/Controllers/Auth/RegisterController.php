<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Role;
//use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'paterno' =>['required','string'],
            'materno' =>['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $role_vendedro = Role::where('Nombre','=','Vendedor')->first();//con el id se hara la relación de usuario_rol
        $role_comprador = Role::where('Nombre','=','Comprador')->first();
        
        $user = User::create([
            'name' => $data['name'],
            'paterno' => $data['paterno'],
            'materno' => $data['materno'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'foto' => Storage::disk('public')->put('img/users', new File($data['foto'])),
        ]);
        $usuario = $user;//se iguala ya que el metodo pide retornar al usuario creado
        $usuario->roles()->attach($role_vendedro);
        $usuario->roles()->attach($role_comprador);

        return $user;//se envia al usuario al registerUser y este inicia sesión con el nuevo usuario creado
        
    }
}
