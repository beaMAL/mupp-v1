<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoControl;
use App\Http\Controllers\GestionSolicitudesController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/{any}', function(){
    return view('home');
})->where('any', '.*');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')
    ->middleware('auth');

Route::apiResource('/productos', ProductoControl::class);
Route::apiResource('/solicitudes', GestionSolicitudesController::class);


// Route::get('prueba')
