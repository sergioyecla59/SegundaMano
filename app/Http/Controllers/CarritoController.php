<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{

    public function pago($id)
    {
        $carrito = session()->get('carrito', []);

        if (!isset($carrito[$id])) {
            return redirect()->route('carrito.index')->with('error', 'Producto no encontrado en el carrito.');
        }

        $producto = $carrito[$id];
        $total = $producto['precio'] * $producto['cantidad'];

        return view('carrito.pago', compact('producto', 'total', 'id'));
    }



public function finalizarCompra(Request $request, $id)
{
    // Validar datos del formulario
    $request->validate([
        'card_number' => ['required', 'digits:16'],
        'expiry' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'],
        'cvc' => ['required', 'digits:3'],
        'name' => ['required', 'string', 'max:255'],
    ]);

    // Obtener carrito
    $carrito = session()->get('carrito', []);

    // Verificar si el producto existe en el carrito
    if (isset($carrito[$id])) {
        // Eliminar producto del carrito
        unset($carrito[$id]);
        session()->put('carrito', $carrito);
    } else {
        return redirect()->back()->with('error', 'El producto no se encontró en el carrito.');
    }

    // Aquí iría la lógica real de pago (simulado)

    // Redirigir con mensaje de éxito
    return redirect()->route('carrito.index')->with('success', 'Compra realizada con éxito.');
}



    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    public function agregar($id)
    {
        // Verifica si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para añadir productos al carrito.');
        }

        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'imagen_url' => $producto->imagen_url,
                'cantidad' => 1
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);
        unset($carrito[$id]);
        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    }
}

