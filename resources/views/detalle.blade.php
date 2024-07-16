@extends('layouts.app')

@section('titulo', 'Ebenezer-Store')

@section('content')
    <div class="container">
        <p>Detalles del producto/Categoria/{{ $producto->categoria }} </p>
        <div class="row">

            <div class="col-5">
                <div class="imagen-producto">
                    <img src="{{ Storage::url($producto->imagen) }}" alt="Imagen de referencia">
                </div>
            </div>

            <div class="col-7 datos-productos">
                <h3>{{ $producto->titulo }}</h3>
                <p>${{ number_format($producto->precio, 0, ',', '.') }}</p>

                <form action="{{ route('cart.add', $producto->id) }}" method="POST">
                    @csrf
                    <div class="tallas-disponibles">
                        <h3>Tallas Disponibles</h3>
                        @foreach($producto->tallas_disponibles as $talla)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="talla" id="talla{{ $talla }}" value="{{ $talla }}" required>
                                <label class="form-check-label" for="talla{{ $talla }}">{{ $talla }}</label>
                            </div>
                        @endforeach

                        <br><br>

                        <h3>Cantidad</h3>
                        <div class="input-group input-group-sm mb-3 text-center">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="btnMenos">-</button>
                            </div>
                            <input type="number" class="form-control text-center" value="1" min="1" max="10" id="cantidad" name="cantidad">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="btnMas">+</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Añadir al Carrito</button>
                </form>
            </div>
        </div>

        <br><br>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Detalles del Producto</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Especificaciones</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <h1>Descripción</h1>
                <p class="mt-4 ">{{ $producto->descripcion }}</p>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="ml-4">
                    <h1>Material</h1>
                    <p>Franela</p>

                    <br>
                    <ul>
                        <li>LAVAR A MANO</li>
                        <li>NO USAR CLORO</li>
                        <li>NO RETORCER</li>
                        <li>PLANCHADO TIBIO</li>
                        <li>HECHO EN MEDELLÍN</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btnMenos = document.getElementById('btnMenos');
            var btnMas = document.getElementById('btnMas');
            var inputCantidad = document.getElementById('cantidad');

            btnMas.addEventListener('click', function() {
                var currentValue = parseInt(inputCantidad.value);
                if (!isNaN(currentValue)) {
                    inputCantidad.value = currentValue + 1;
                } else {
                    inputCantidad.value = 1;
                }
            });

            btnMenos.addEventListener('click', function() {
                var currentValue = parseInt(inputCantidad.value);
                if (!isNaN(currentValue) && currentValue > 1) {
                    inputCantidad.value = currentValue - 1;
                } else {
                    inputCantidad.value = 1;
                }
            });
        });
    </script>

    @include('layouts.botonsubir')
@endsection
