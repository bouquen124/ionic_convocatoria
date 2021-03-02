<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');


Route::resource('cTipos', App\Http\Controllers\C_tipoController::class);

Route::resource('cEstados', App\Http\Controllers\C_estadoController::class);

Route::resource('cClinicas', App\Http\Controllers\C_clinicaController::class);

Route::resource('tUsuarios', App\Http\Controllers\T_usuarioController::class);

Route::resource('cProfesionals', App\Http\Controllers\C_profesionalController::class);

Route::resource('cEstudiantes', App\Http\Controllers\C_estudianteController::class);

Route::resource('tCasos', App\Http\Controllers\T_casosController::class);

Route::resource('cBoletins', App\Http\Controllers\C_boletinController::class);