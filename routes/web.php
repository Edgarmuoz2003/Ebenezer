<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\tiendaController;
use App\Http\Controllers\nosotrosController;
use App\Http\Controllers\contactenosController;
use App\Http\Controllers\DestallesController;
use App\Http\Controllers\ProductosController;

// RUTAS GENERALES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tienda', tiendaController::class)->name('tienda');
Route::get('/nosotros', nosotrosController::class)->name('nosotros');
Route::get('/contactenos', contactenosController::class)->name('contactenos');
Route::get('/detalle/{id}', [DestallesController::class, 'show'])->name('ruta_detalles');
Route::get('/carrito', [CarritoController::class, 'index'])->name('cart.index');
Route::post('/carrito/{id}', [CarritoController::class, 'addToCart'])->name('cart.add');
Route::delete('/carrito/{id}', [CarritoController::class, 'removeFromCart'])->name('cart.remove');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/Home', [HomeController::class, 'index'])->name('inicio');

    Route::get('/Gestion-productos', [ProductosController::class, 'index'])->name('gestionProductos.index');
    Route::post('/Gestion-productos/guardar', [ProductosController::class, 'store'])->name('gestionProductos.store');
    Route::get('/Gestion-productos/{id}', [ProductosController::class, 'edit'])->name('gestionProductos.edit');
    Route::put('/Gestion-productos/{id}', [ProductosController::class, 'update'])->name('gestionProductos.update');
    Route::delete('/Gestion-productos/{id}', [ProductosController::class, 'destroy'])->name('gestionProductos.destroy');
});
