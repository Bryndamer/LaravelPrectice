<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MarcaController;

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
    return view('welcome');
});

Route::get('empleados', [EmpleadoController::class, 'index']);

Route::post('empleados/crear', [EmpleadoController::class, "save"]);
Route::post('empleados/editar', [EmpleadoController::class, "editar"]);
Route::post('empleados/delete', [EmpleadoController::class, "delete"]);

Route::resource('marcas', MarcaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
