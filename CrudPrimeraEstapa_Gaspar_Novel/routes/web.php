<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LanguageController;


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
// Ruta padre
Route::get('/', function () {
    return view('home');
})->name('home');
// Rtua que muestra que estas conectado
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// Ruta resource que contiene todas las necesarias para el CRUD
Route::resource('/usuarios', UsuarioController::class)->middleware(['auth']);
// Ruta fallback devuelve al home si no encuentra una pagina
Route::fallback(function () {
    return redirect('/');
});
// Ruta para el cambio de idioma
Route::get('/set_language/{lang}', [LanguageController::class, 'set_language'])->name('set_language');
require __DIR__.'/auth.php';
