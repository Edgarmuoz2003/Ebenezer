<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productosRecientes = Producto::latest()->take(6)->get();
        return view('welcome', compact('productosRecientes'));
    }
}
