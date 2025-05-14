<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class InicioController extends Controller
{
    public function index()
    {
        // Cargar todas las categorías con hasta 4 productos aleatorios
        $categorias = Categoria::with(['productos' => function ($query) {
            $query->inRandomOrder()->take(4);
        }])->get();

        return view('inicio_publico', compact('categorias'));
    }
}
?>