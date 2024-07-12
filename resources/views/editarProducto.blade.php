@extends('layouts.app')

@section('titulo', 'Editar Producto')

@section('content')
<div class="container pb-4">
    <h1 class="text-center">Editar Producto</h1>

    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <form action="{{ route('gestionProductos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título de la publicación</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $producto->titulo }}">
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Cargar Imagen</label>
                    <input type="file" name="imagen" class="form-control" id="imagen" accept="image/*">
                </div>

                @if ($producto->imagen)
                <div class="mb-3">
                    <label class="form-label">Imagen Actual</label><br>
                    <div style="max-height: 380px; overflow: hidden;">
                        <img src="{{ Storage::url($producto->imagen) }}" class="img-fluid rounded" style="width: 100%; height: auto;">
                    </div>
                </div>
                @endif

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" name="precio" class="form-control" id="precio" value="{{ $producto->precio }}">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" cols="40"
                        rows="5">{{ $producto->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select name="categoria" id="categoria" class="form-select">
                        <option value="Pijamas" {{ $producto->categoria === 'Pijamas' ? 'selected' : '' }}>Pijamas
                        </option>
                        <option value="Camisetas" {{ $producto->categoria === 'Camisetas' ? 'selected' : '' }}>
                            Camisetas</option>
                        <option value="Blusas" {{ $producto->categoria === 'Blusas' ? 'selected' : '' }}>Blusas
                        </option>
                        <option value="Maquillaje" {{ $producto->categoria === 'Maquillaje' ? 'selected' : '' }}>
                            Maquillaje</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tallas Disponibles</label>
                    <div class="row">
                        @php
                        $tallas_producto = $producto->tallas_disponibles;
                        $tallas_disponibles = ['XS', 'S', 'M', 'L', 'XL'];
                        @endphp
                        @foreach ($tallas_disponibles as $talla)
                        <div class="col-6 col-sm-4 col-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="tallas_disponibles[]"
                                    id="talla{{ $talla }}" value="{{ $talla }}"
                                    {{ in_array($talla, $tallas_producto) ? 'checked' : '' }}>
                                <label class="form-check-label" for="talla{{ $talla }}">{{ $talla }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="destacado" name="destacado" value="1" {{ $producto->destacado ? 'checked' : '' }}>
                        <label class="form-check-label" for="destacado">Destacado</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="enOferta" name="enOferta" value="1" {{ $producto->enOferta ? 'checked' : '' }}>
                        <label class="form-check-label" for="enOferta">En Oferta</label>
                    </div>
                </div>
                

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{ route('gestionProductos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@if(session('updateSuccess'))
    <div class="alert alert-success">
        {{ session('updateSuccess') }}
    </div>
@endif

@if(session('updateError'))
    <div class="alert alert-danger">
        {{ session('updateError') }}
    </div>
@endif
@endsection


<script>
    let updateError = '{{ session('updateError') }}';


    if (updateError) {
                Swal.fire({
                    title: '¡Ha ocurrido un error!',
                    text: updateError,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
</script>


