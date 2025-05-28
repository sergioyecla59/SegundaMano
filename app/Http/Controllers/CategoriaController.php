<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));

    }


    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen_url' => 'nullable|url|max:255',
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
            'imagen_url' => $request->imagen_url,
        ]);

        return Redirect::route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return Redirect::route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
    public function edit(Categoria $categoria)
{
    return view('categorias.edit', compact('categoria'));
}

public function update(Request $request, Categoria $categoria)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'imagen_url' => 'nullable|url|max:255',

    ]);

    $categoria->update([
        'nombre' => $request->nombre,
        'imagen_url' => $request->imagen_url,
    ]);

    return Redirect::route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
}
public function verProductos(Categoria $categoria)
{
    $productos = $categoria->productos; // relación definida en el modelo
    return view('categorias.productos', compact('categoria', 'productos'));
}


}
