<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TramosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventosController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
});

/* USUARIO */
Route::get('/user', [UsuarioController::class, 'index'])->middleware(['auth'])->name('user.index');
Route::post('/user/add_car/{id}', [UsuarioController::class, 'add_car'])->middleware(['auth'])->name('user.add_car');
Route::put('/user/update_user/{id}', [UsuarioController::class, 'update'])->middleware(['auth'])->name('user.update_user');
Route::delete('/user/delete_car/{id}', [UsuarioController::class, 'destroy_car'])->middleware(['auth'])->name('user.destroy_car');
Route::put('/user/update_car/{id}', [UsuarioController::class, 'update_car'])->middleware(['auth'])->name('user.update_car');
/* TRAMOS */
Route::get('/', [TramosController::class, 'index'])->name('tramos.index');//ruta publica
Route::get('/tramos', [TramosController::class, 'index'])->name('tramos.index');//ruta publica
Route::post('/tramos/store/{id}', [TramosController::class, 'store'])->middleware(['auth'])->name('tramos.store');
Route::put('/tramos/update/{id}/{location}', [TramosController::class, 'update'])->middleware(['auth'])->name('tramos.update');
Route::delete('/tramos/delete/{id}', [TramosController::class, 'destroy'])->middleware(['auth'])->name('tramos.destroy');
/* RALLYS */
/* EVENTOS */
Route::get('/eventos', [EventosController::class, 'index'])->name('eventos.index');

require __DIR__.'/auth.php';
