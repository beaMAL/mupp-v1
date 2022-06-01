<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FavoritosController;
use App\Http\Controllers\Api\UsuarioPublicaRegistroController;
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

//Estas rutas son las que en teoria vamos a usar desde vue con axios, pero entonces no se por que narices a mi me funciona como lo tengo en web.php
Route::resource('producto', App\Http\Controllers\ProductoControl::class)->only('index', 'store', 'show', 'update', 'destroy');
Route::get('lista-registros-producto/{producto_id}', [RegistrosController::class, 'listarRegistrosDeProducto']);



// Rutas para auth
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

//rutas protegidas por la autentificacion de SANCTUM
Route::group(['middleware' => ["auth:sanctum"]], function () {
    //rutas
    Route::get('perfil-usuario', [UserController::class, 'perfilUsuario']);
    Route::get('logout', [UserController::class, 'logout']);


    Route::post('add-favorito', [FavoritosController::class, 'addFavorito']);
    Route::get('listar-favoritos', [FavoritosController::class, 'listFavoritos']);
    Route::delete('listar-favoritos/{user_id}/{producto_id}', [FavoritosController::class, 'eliminarFavorito']);

    Route::post('registrar-producto', [UsuarioPublicaRegistroController::class, 'registrarProducto']);
    Route::delete('eliminar-registro/{registro_id}', [UsuarioPublicaRegistroController::class, 'eliminarRegistro']);
    Route::put('modificar-registro/{registro_id}',[ UsuarioPublicaRegistroController::class, 'modificarRegistro']);
    Route::get('lista-registros-usuario', [UsuarioPublicaRegistroController::class, 'listarRegistrosDeUsuario']);
});


