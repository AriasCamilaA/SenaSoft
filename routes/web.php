<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VehiculoController;

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
    // Aquí van las rutas protegidas que requieren autenticación
    // Route::resource('/', VehiculoController::class);
    Route::get('/', [VehiculoController::class, 'index'])->name('vehiculos.index');

    // web.php
    Route::get('/vehiculos/categoria/{cat_id}', [App\Http\Controllers\VehiculoController::class, 'filtrarPorCategoria'])->name('vehiculos.categoria'); 
});
