<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;

class CarritoController extends Controller
{

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

    // app/Http/Controllers/CarritoController.php



    public function finalizarCompra(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);

        if (!isset($carrito[$id])) {
            return redirect()->route('carrito.index')->with('error', 'Producto no encontrado en el carrito.');
        }

        $producto = $carrito[$id];

        // Validar campos de pago simulados (opcional)
        $request->validate([
            'card_number' => 'required',
            'expiry' => 'required',
            'cvc' => 'required',
            'name' => 'required|string|max:255',
        ]);

        // Registrar la venta
        Venta::create([
            'producto' => $producto['nombre'],
            'precio' => $producto['precio'],
            'cantidad' => $producto['cantidad'],
            'total' => $producto['precio'] * $producto['cantidad'],
            'titular' => $request->input('name'),
        ]);

        // Eliminar del carrito
        unset($carrito[$id]);
        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', '¡Compra registrada y producto eliminado del carrito!');
    }




}

