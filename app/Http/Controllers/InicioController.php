<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class InicioController extends Controller
{
    // Productos aleatorios por categoría
  // app/Http/Controllers/InicioController.php

public function index(Request $request)
{
    $buscar = $request->input('buscar');

    $categorias = Categoria::with(['productos' => function ($query) use ($buscar) {
        if ($buscar) {
            $query->where('nombre', 'like', '%' . $buscar . '%');
        } else {
            $query->inRandomOrder()->take(4);
        }
    }])->get();

    return view('inicio_publico', compact('categorias', 'buscar'));
}


public function mostrar(Request $request)
{
    $buscar = $request->input('buscar');

    $categorias = Categoria::with(['productos' => function ($query) use ($buscar) {
        if ($buscar) {
            $query->where('nombre', 'like', '%' . $buscar . '%');
        } else {
            $query->inRandomOrder()->take(4); // Muestra 4 productos aleatorios por categoría
        }
    }])->get();

    return view('inicio', compact('categorias', 'buscar'));
}


}
