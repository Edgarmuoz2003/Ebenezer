<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function __invoke()
    {
        $pijamas = Producto::where('categoria', 'pijamas')->get();
        $camisetas = Producto::where('categoria', 'camisetas')->get();
        $enOferta = Producto::where('enOferta', true)->get();
        return view('tienda', compact('pijamas', 'camisetas', 'enOferta'));
    }
}

