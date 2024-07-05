<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function __invoke()
    {
        return view('tienda');
    }
}

