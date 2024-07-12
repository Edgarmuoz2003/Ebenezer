<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class DestallesController extends Controller
{
    public function show($id){
        $producto = Producto::findOrFail($id);
        return view('detalle', compact('producto'));
    }
}
