<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\UserController;
use App\Models\Servicio;

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

Route::redirect('/', 'servicio/');  //redireccion de / a servicio/
Route::redirect('/home', 'servicio/');  //redireccion de /home a servicio/


Route::get('/Qsomos', function () {  //cuendo este /Qsomos va a mostrar la vista de servicio.QueSomos
    return view('servicio.QueSomos');
});

Route::get('/ayuda', function () {  //cuendo este /ayuda va a mostrar la vista de servicio.ayuda
    return view('servicio.ayuda');
});

Route::get('servicio/streaming', function () {  //cuendo este /ayuda va a mostrar la vista de servicio.ayuda
    return view('servicio.streaming');
});


Route::resource('servicio', ServicioController::class)->middleware('auth')->except('show');  //autentificacion para que solo el admin pueda hacer crud
Route::resource('servicio', ServicioController::class)->only(['show']); 
//Route::resource('servicio.admin', ServicioController::class)->middleware('auth'); 

Route::get('buscar/servicio',[BuscarController::class,'servicios'])->name('buscar.servicio');

Route::get('buscar/',[BuscarController::class,'servicios'])->name('buscar');

Route::get('/software',[BuscarController::class,'software']);
Route::get('/hardware',[BuscarController::class,'hardware']);
Route::get('/misServicios',[BuscarController::class,'misServicios']);
Route::get('perfil/',[UserController::class,'perfil'])->middleware('auth');

Auth::routes();

Route::get('/home', [ServicioController::class, 'index'])->name('home');

Route::group(['middleware', 'auth'], function(){
    Route::get('/servicio',[ServicioController::class, 'index'])->name('home');
});