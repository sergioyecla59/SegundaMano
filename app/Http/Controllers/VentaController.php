<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{

    public function index()

{

    $ventas = Venta::latest()->get();

    return view('ventas.index', compact('ventas'));

}
}
