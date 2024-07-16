@extends('layouts.app')

@section('content')
    <div class="container mt-4 pb-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Productos en el carrito</h5>
                    </div>
                    <div class="card-body">
                        @if (count($cart) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Talla</th>
                                        <th>Subtotal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $id => $item)
                                        <tr>
                                            <td>{{ $item['titulo'] }}</td>
                                            <td>{{ $item['precio'] }}</td>
                                            <td>{{ $item['cantidad'] }}</td>
                                            <td>{{ $item['talla'] }}</td>
                                            <td>{{ $item['cantidad'] * $item['precio'] }}</td>
                                            <td>
                                                <form action="{{ route('cart.remove', ['id' => $id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No hay productos en el carrito.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Resumen de la compra</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Total de productos:</strong> {{ session('cartCount', 0) }}</p>
                        <p><strong>Total a Pagar:</strong> $<span id="totalPago"></span></p>
                        <a href="#{{-- route('checkout') --}}" class="btn btn-primary">Ir a Pagar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            calcularTotal();
        });

        function calcularTotal() {
            let cart = @json($cart);
            let total = 0;
            Object.values(cart).forEach(item => {
                total += item.cantidad * item.precio;
            });
            document.getElementById('totalPago').textContent = total.toFixed(0);
        }
    </script>


