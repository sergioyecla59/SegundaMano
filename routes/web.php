<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Ruta principal - Si no está autenticado, va al login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Rutas de login y registro sin autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Ruta de inicio para usuarios autenticados
Route::get('/inicio', function() {
    return view('inicio');  
})->middleware('auth')->name('inicio');

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
