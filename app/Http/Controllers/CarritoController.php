<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    // Mostrar el carrito de compras
    public function index()
    {
        $cart = session(null)->get('cart', []);
        return view('carrito', compact('cart'));
    }

    // Añadir un producto al carrito de compras
    public function addToCart(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $cart = session(null)->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['cantidad'] += $request->cantidad;
            $cart[$id]['talla'] = $request->talla;
        } else {
            $cart[$id] = [
                "titulo" => $producto->titulo,
                "precio" => $producto->precio,
                "talla" => $request->talla,
                "cantidad" => $request->cantidad,
                "imagen" => $producto->imagen,
            ];
        }

        session(null)->put('cart', $cart);
        session(null)->put('cartCount', array_sum(array_column($cart, 'cantidad')));

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    // Eliminar un producto del carrito de compras
    public function removeFromCart($id)
    {
        $cart = session(null)->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(null)->put('cart', $cart);

            session(null)->put('cartCount', array_sum(array_column($cart, 'cantidad')));
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }
}
