<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadoresController;

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
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/login',[HomeController::class,'login'])->name('home.login');

Route::get('/equipos',[EquipoController::class,'index'])->name('equipos.index');
Route::post('/equipos',[EquipoController::class,'store'])->name('equipos.store');
Route::delete('/equipos/{equipo}',[EquipoController::class,'destroy'])->name('equipos.destroy');
Route::get('/equipos/{equipo}',[EquipoController::class,'show'])->name('equipos.show');

Route::get('/jugadores',[JugadoresController::class,'index'])->name('jugadores.index');
Route::post('/jugadores',[JugadoresController::class,'store'])->name('jugadores.store');
Route::get('/jugadores/{jugador}/edit',[JugadoresController::class,'edit'])->name('jugadores.edit');
Route::put('/jugadores/{jugador}',[JugadoresController::class,'update'])->name('jugadores.update');




