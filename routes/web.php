<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('form');
});

Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::get('/create','App\Http\Controllers\ProductosController@create');
Route::get('/edit/{SKU}','App\Http\Controllers\ProductosController@edit');
Route::get('/productos','App\Http\Controllers\ProductosController@index');//Mostrar todo
Route::post('/productos','App\Http\Controllers\ProductosController@store');//Crear
Route::put('/edit/{SKU}','App\Http\Controllers\ProductosController@update');//Actualizar
Route::delete('/delete/{SKU}','App\Http\Controllers\ProductosController@destroy');//Eliminar
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');