<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\ObjetoController;

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

/* RUTA PARA TODOS LOS METODOS */
Route::resource('alumno', AlumnoController::class);
Route::resource('encargado', EncargadoController::class);
Route::resource('objeto', ObjetoController::class);

Route::get('/', function () {
    return view('welcome');
});
