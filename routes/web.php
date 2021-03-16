<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TypeController;
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
    return view('home');
});
Route::get('/Create-Pokemon', [PokemonController::class, 'create'])->name('create/pokemon');
Route::get('/Welcome-Pokemon', [PokemonController::class, 'index'])->name('home/pokemon');
Route::get('/List-Pokemon', [PokemonController::class, 'index2'])->name('list/pokemon');
Route::get('/Show-Pokemon/{id}', [PokemonController::class, 'show'])->name('show/pokemon/{id}');
Route::get('/Edit-Pokemon/{id}', [PokemonController::class, 'edit'])->name('edit/pokemon{id}');
Route::post('/Create-Pokemon', [PokemonController::class, 'store'])->name('create/pokemon');
Route::post('/Update-Pokemon/{id}', [PokemonController::class, 'update'])->name('update/pokemon/{id}');
Route::post('/Delete-Pokemon/{id}', [PokemonController::class, 'destroy'])->name('destroy/pokemon{id}');

Route::get('/Create-Type', [TypeController::class, 'create'])->name('create/type');
Route::get('/Welcome-Type', [TypeController::class, 'index'])->name('home/type');
Route::get('/List-Type', [TypeController::class, 'index2'])->name('list/type');
Route::get('/Show-Type/{id}', [TypeController::class, 'show'])->name('show/type/{id}');
Route::get('/Edit-Type/{id}', [TypeController::class, 'edit'])->name('edit/type/{id}');
Route::post('/Create-Type', [TypeController::class, 'store'])->name('create/type');
Route::post('/Update-Type/{id}', [TypeController::class, 'update'])->name('update/type/{id}');
Route::post('/Delete-Type/{id}', [TypeController::class, 'destroy'])->name('destroy/type/{id}');
