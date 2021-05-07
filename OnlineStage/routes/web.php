<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TramosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\SobreNosotrosController;
use App\Http\Controllers\RallysController;

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
Route::delete('/tramos/delete/{id}/{location}', [TramosController::class, 'destroy'])->middleware(['auth'])->name('tramos.destroy');
/* RALLYS */
Route::get('/rallys', [RallysController::class, 'index'])->name('rallys.index');//ruta publica
Route::post('/rallys/store/{id}', [RallysController::class, 'store'])->middleware(['auth'])->name('rallys.store');
Route::delete('/rallys/delete/{id}/{location}', [RallysController::class, 'destroy'])->middleware(['auth'])->name('rallys.destroy');
Route::post('/rallys/quit/{id_user}/{id_rally}', [RallysController::class, 'quit'])->middleware(['auth'])->name('rally.quit');
Route::put('/rallys/update/{id}/{location}', [RallysController::class, 'update'])->middleware(['auth'])->name('rally.update');
Route::get('/rallys/signup/{id_user}/{id_rally}', [RallysController::class, 'signup'])->middleware(['auth'])->name('rally.signup');
Route::post('/rallys/signup/{id_user}/{id_rally}/{id_coche}', [RallysController::class, 'signup_car'])->middleware(['auth'])->name('rally.signup_car');
/* EVENTOS */
Route::get('/eventos', [EventosController::class, 'index'])->name('eventos.index');//ruta publica
Route::post('/eventos/store/{id}', [EventosController::class, 'store'])->middleware(['auth'])->name('eventos.store');
Route::put('/eventos/update/{id}/{location}', [EventosController::class, 'update'])->middleware(['auth'])->name('eventos.update');
Route::delete('/eventos/delete/{id}/{location}', [EventosController::class, 'destroy'])->middleware(['auth'])->name('eventos.destroy');
Route::post('/eventos/signup/{id_user}/{id_event}', [EventosController::class, 'signup'])->middleware(['auth'])->name('evento.signup');
Route::post('/eventos/quit/{id_user}/{id_event}', [EventosController::class, 'quit'])->middleware(['auth'])->name('evento.quit');
//* SOBRE NOSOTROS *//
Route::get('/sobre_nosotros', [SobreNosotrosController::class, 'index'])->name('sobre_nosotros.index');//ruta publica

require __DIR__.'/auth.php';
