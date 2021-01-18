<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('inicio');
});

Route::resource("inicio","InicioController");
Route::get("Buscar/inicio","BuscarController@Buscar")->name("Buscar.Buscar");

Route::resource("categorias","CategoriaController")->middleware('auth');

Route::resource("productos","ProductoController")->middleware('auth');

Route::put("EstatusProducto/{producto}","ProductoController@updateEstado")->name("EstatusProducto")->middleware('auth');

Route::get("revision/productos/{producto}","ProductoController@GetVistaProducto")->name("revision/productos");

Route::resource("pregunta","PreguntarController");

Route::resource("Admin","AdminController")->middleware('auth');
Route::resource("Encargado","EncargadoController")->middleware('auth');
Route::resource("Cliente","ClienteController")->middleware('auth');

Route::resource("Registro","RegisterUserController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
