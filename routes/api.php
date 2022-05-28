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

//Estas rutas son las que en teoria vamos a usar desde vue con axios, pero entonces no se por que narices a mi me funciona como lo tengo en web.php
Route::resource('producto', App\Http\Controllers\ProductoControl::class)->only('index', 'store', 'show', 'update', 'destroy');
