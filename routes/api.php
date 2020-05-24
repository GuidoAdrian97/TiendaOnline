<?php

use Illuminate\Http\Request;

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

Route::apiResource('categoria','API\categoriaController')->names('Api.Categoria');
Route::apiResource('producto','API\ProductoController')->names('Api.Producto');
Route::apiResource('rol','API\RolController')->names('Api.Rol');
Route::delete('/eliminarimagen/{id}','API\ProductoController@eliminarimagen')->name('Api.eliminarimagen');
