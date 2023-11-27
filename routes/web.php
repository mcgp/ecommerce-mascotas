<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CorreoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('mascotas', MascotaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class);
Route::post('/enviar-correo', [CorreoController::class, 'enviarCorreo'])->name('enviar-correo');
Route::resource('users', UserController::class);




