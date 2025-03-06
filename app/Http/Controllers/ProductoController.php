<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Muestra todos los productos.
     */
    public function index()
    {
        // Obtener todos los productos de la base de datos
        $productos = Producto::all();

        // Devolver la vista con los productos
        return \view('productos.index', \compact('productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías desde la base de datos
        return \view('productos.create', \compact('categorias')); // Pasar las categorías a la vista
    }

    /**
     * Almacena un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Creación del producto
        Producto::create($request->all());

        return Redirect::route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Muestra un producto específico.
     */
    public function show(Producto $producto)
    {
        return \view('productos.show', \compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all(); // Cargar categorías para el formulario de edición
        return \view('productos.edit', \compact('producto', 'categorias'));
    }

    /**
     * Actualiza el producto en la base de datos.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Actualización del producto
        $producto->update($request->all());

        return Redirect::route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return Redirect::route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
