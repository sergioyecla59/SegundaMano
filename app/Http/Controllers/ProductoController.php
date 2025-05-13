<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return \view('productos.index', \compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return \view('productos.create', \compact('categorias'));
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'precio' => 'required|numeric|min:0',
                'categoria_id' => 'exists:categorias,id',
            ]);

            Producto::create([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'user_id' => Auth::id(),
                'categoria_id' => $request->categoria_id,
            ]);

            return Redirect::route('productos.index')->with('success', 'Producto creado correctamente.');
        } else {
            return Redirect::route('login')->with('error', 'Por favor, inicie sesión para continuar.');
        }
    }

    public function show(Producto $producto)
    {
        return \view('productos.show', \compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return \view('productos.edit', \compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
{
    //dd($request->all());
    // Validación de datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
        'categoria_id' => 'exists:categorias,id',
    ]);

    // Actualización del producto
    $producto->nombre = $request->input('nombre');
    $producto->precio = $request->input('precio');
    $producto->categoria_id = $request->input('categoria_id');
    $producto->save();
    
    return Redirect::route('productos.index')->with('success', 'Producto actualizado correctamente.');
}


    public function destroy(Producto $producto)
    {
        $producto->delete();
        return Redirect::route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
