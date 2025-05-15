<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class InicioController extends Controller
{
    public function index()
    {
        // Solo categorías con productos del user_id = 1
        $categorias = Categoria::with(['productos' => function ($query) {
            $query->where('user_id', 1)->inRandomOrder()->take(4);
        }])->get();
    
        return view('inicio_publico', compact('categorias'));
    }
}
?>