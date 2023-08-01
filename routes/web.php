<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PerfilController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [VehiculoController::class, 'index'])->name('vehiculos.index');
    Route::get('/vehiculos/agregar', [VehiculoController::class, 'create'])->name('vehiculos.agregar');
    Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculos.store');
    Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
});
