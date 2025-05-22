<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\InicioController;
use App\Models\Producto;
use App\Http\Controllers\CarritoController;



Route::get('/inicio', [InicioController::class, 'mostrar'])->name('inicio');




Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
// Ruta para el pago
Route::get('/carrito/pago/{id}', [CarritoController::class, 'pago'])->name('carrito.pago');
Route::post('/carrito/pago/{id}', [CarritoController::class, 'finalizarCompra'])->name('carrito.finalizar');
// En web.php
Route::post('/carrito/finalizar/{id}', [CarritoController::class, 'finalizarCompra'])->name('carrito.finalizar');



// Ruta principal (productos aleatorios)
Route::get('/', [InicioController::class, 'index'])->name('inicio_publico');

// Rutas de login y registro sin autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Ruta de inicio para usuarios autenticados
//Route::get('/inicio', function() {
  //  return view('inicio');
//})->middleware('auth')->name('inicio');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Rutas de categorías
    Route::resource('categorias', CategoriaController::class);
    Route::get('categorias/{categoria}/productos', [CategoriaController::class, 'verProductos'])->name('categorias.productos');


    // Rutas de productos (ahora correctamente definidas con el controlador)
    Route::resource('productos', ProductoController::class);
    Route::get('categorias/{categoria}/productos', [CategoriaController::class, 'verProductos'])->name('categorias.productos');


    // Rutas de ventas
    Route::get('/ventas', function () {
        return view('ventas');
    })->name('ventas');

    // Rutas de usuarios
    Route::resource('usuarios', UserController::class)->only(['index', 'show']);
});
