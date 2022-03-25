<?php

use App\Http\Controllers\ProductoController;
use App\Http\Livewire\Select2;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Endpoint destinado a la main page de nuestro Modelo/Controlador/database

Route::resource('/productos', ProductoController::class );//->middleware(['auth']);

//Endpoint destinado a la clase de select2
Route::get('select2', Select2::class)->name('select2');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
