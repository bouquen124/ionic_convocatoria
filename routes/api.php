<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('c_tipos', 'C_tipoAPIController');

Route::resource('c_estados', 'C_estadoAPIController');

Route::resource('c_clinicas', 'C_clinicaAPIController');

Route::resource('t_usuarios', 'T_usuarioAPIController');

Route::resource('c_profesionals', 'C_profesionalAPIController');

Route::resource('c_estudiantes', 'C_estudianteAPIController');

Route::resource('t_casos', 'T_casosAPIController');

Route::resource('c_boletins', 'C_boletinAPIController');