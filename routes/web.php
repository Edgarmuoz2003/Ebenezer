<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tiendaController;
use App\Http\Controllers\nosotrosController;
use App\Http\Controllers\contactenosController;
use App\Http\Controllers\ProductosController;

// RUTAS GENERALES
Route::get('/', function () { return view('welcome');})->name('home');
Route::get('/tienda', tiendaController::class)->name('tienda');
Route::get('/nosotros', nosotrosController::class)->name('nosotros');
Route::get('/contactenos', contactenosController::class)->name('contactenos');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/Home', function () {
        return view('welcome');
    })->name('inicio');

    Route::get('/Gestion-productos', [ProductosController::class, 'index'])->name('gestionProductos.index');
});
