<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{

public function index()
{
    // Carga las ventas con los productos relacionados para evitar consultas N+1
    $ventas = Venta::with('producto')->latest()->get();

    return view('ventas.index', compact('ventas'));
}


}
