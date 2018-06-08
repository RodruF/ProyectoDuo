<?php

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});*/
Route::group(['prefix' => 'v1'], function () {
    
    Route::apiResource('animals', 'AnimalController');
    Route::apiResource('cuidadors', 'CuidadorController');
    Route::apiResource('especies', 'EspecieController');
    Route::apiResource('jaulas', 'JaulaController');
    Route::apiResource('productos', 'ProductosController');
    Route::apiResource('users', 'UserController');
    Route::apiResource('usuarios', 'UsuariosController');
    Route::post('login', 'UsuariosController@login');

});
