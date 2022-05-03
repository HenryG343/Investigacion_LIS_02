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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/productos','App\Http\Controllers\ProductosController@index');//Mostrar todo
Route::post('/productos','App\Http\Controllers\ProductosController@store');//Crear
Route::put('/productos/{SKU}','App\Http\Controllers\ProductosController@update');//Actualizar
Route::delete('/productos/{SKU}','App\Http\Controllers\ProductosController@destroy');//Eliminar





















Route::get('productos/buscarNombre/{nombre}','App\Http\Controllers\ProductosController@buscarNombre');//Buscar por nombre
Route::get('productos/buscarSKU/{SKU}','App\Http\Controllers\ProductosController@buscarSKU');//Buscar por SKU

























//Usuarios
Route::get('/user','App\Http\Controllers\UsersController@index');//Mostrar todo
Route::post('/user','App\Http\Controllers\UsersController@store');//Crear
Route::put('/user/{id}','App\Http\Controllers\UsersController@update');//Actualizar
Route::delete('/user/{id}','App\Http\Controllers\UsersController@destroy');//Eliminar


//Login y registro
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function($router){
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});