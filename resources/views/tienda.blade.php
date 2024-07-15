@extends('layouts.app')

@section('titulo', 'Ebenezer-Store')

@section('content')
<div class="container featured-categories">
    <h2>Productos en Oferta</h2>
    <div class="row">
        @foreach ($enOferta as $oferta)
            <div class="col-md-3">
                <div class="product-container">
                    <a href="{{ route('ruta_detalles', $oferta->id) }}">
                        <img src="{{ Storage::url($oferta->imagen) }}" alt="{{ $oferta->titulo }}" class="product-image">
                        <div class="offer-label">Oferta</div>
                    </a>
                    <h5>{{ $oferta->titulo }}</h5>
                    <p>${{ number_format($oferta->precio, 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>


    <div class="container featured-categories">
        <h1 class="text-center">Pijamas</h1>
        <div class="row">
            @foreach ($pijamas as $pijama)
                <div class="col-md-3">
                    <a href="{{ route('ruta_detalles', $pijama->id) }}">
                        <img src="{{ Storage::url($pijama->imagen) }}" alt="{{ $pijama->titulo }}">
                    </a>
                    <h5>{{ $pijama->titulo }}</h5>
                    <p>${{ number_format($pijama->precio, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container featured-categories">
        <h2>Camisetas</h2>
        <div class="row">
            @foreach ($camisetas as $camiseta)
                <div class="col-md-3">
                    <a href="{{ route('ruta_detalles', $camiseta->id) }}">
                        <img src="{{ Storage::url($camiseta->imagen) }}" alt="{{ $camiseta->titulo }}">
                    </a>
                    <h5>{{ $camiseta->titulo }}</h5>
                    <p>${{ number_format($camiseta->precio, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    </div>

    @include('layouts.botonsubir')



@endsection
