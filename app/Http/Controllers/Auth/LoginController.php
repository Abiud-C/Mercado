<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectPath()
    {
        $user = Auth::user();
        $userb = User::with('roles')->where('id', $user->id)->first();

        $role= $userb->roles->first()->Nombre;

        switch ($role) {
            case 'Supervisor':
                return "/Admin";
                break;
            case 'Encargado':
                return "/Encargado";
                break;
            case 'Comprador':
                return "/Cliente";
                break;
            case 'Vendedor':
                return "/Cliente";
                break;
            default:
                return "/";
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
