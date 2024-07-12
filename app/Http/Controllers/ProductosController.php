<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use PhpParser\Node\Stmt\TryCatch;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'titulo' => 'required|string|max:50',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'precio' => 'required|integer',
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
            'tallas_disponibles' => 'required|array',
            'destacado' => 'boolean',
            'enOferta' => 'boolean',
        ]);

        try {
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $rutaImagen = $imagen->storeAs('public/img', $nombreImagen);
    
                $datosValidados['imagen'] = $rutaImagen;
            }
    
            $producto = Producto::create($datosValidados);
    
            return redirect()->route('gestionProductos.index')
            ->with('success', '¡Producto creado correctamente!');
        } catch (\Throwable $th) {
            Log::error("Error al crear el producto: ' . $th->getMessage()");

            return redirect()->back()
                ->withInput()
                ->with('error', 'Ha ocurrido un error al crear el producto. Por favor, intenta nuevamente.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('editarProducto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Log::info('Iniciando actualización del producto');
    
        $request->validate([
            'titulo' => 'required|string|max:50',
            'precio' => 'required|integer',
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
            'tallas_disponibles' => 'required|array',
            'destacado' => 'boolean',
            'enOferta' => 'boolean',
        ]);
    
        try {
            Log::info('Validación completada');
            
            $producto = Producto::findOrFail($id);
            Log::info('Producto encontrado', ['producto' => $producto]);
    
            // Actualizar los campos del producto
            $producto->titulo = $request->input('titulo');
            $producto->precio = $request->input('precio');
            $producto->descripcion = $request->input('descripcion');
            $producto->categoria = $request->input('categoria');
    
            // Manejar las tallas disponibles
            $tallas_disponibles = $request->input('tallas_disponibles');
            $producto->tallas_disponibles = $tallas_disponibles ?? [];
            $producto->destacado = $request->boolean('destacado');
            $producto->enOferta = $request->boolean('enOferta');
            Log::info('Campos actualizados', ['producto' => $producto]);
    
            // Manejar la imagen si se proporciona
            if ($request->hasFile('imagen')) {
                Log::info('Imagen proporcionada');
                
                // Eliminar la imagen anterior si existe
                if ($producto->imagen) {
                    Storage::delete($producto->imagen);
                    Log::info('Imagen anterior eliminada');
                }
    
                // Almacenar la nueva imagen y guardar la ruta en la base de datos
                $imagenPath = $request->file('imagen')->store('public/img');
                $producto->imagen = $imagenPath;
                Log::info('Nueva imagen almacenada', ['imagenPath' => $imagenPath]);
            }
    
            // Guardar el producto actualizado
            $producto->save();
            Log::info('Producto actualizado', ['producto' => $producto]);
    
            // Redirigir con un mensaje de éxito
            return redirect()->route('gestionProductos.index')->with('updateSuccess', 'Producto actualizado correctamente');
        } catch (\Throwable $th) {
            Log::error("Error al intentar actualizar el producto: " . $th->getMessage());
    
            return redirect()->back()
                ->withInput()
                ->with('updateError', 'Ha ocurrido un error al actualizar el producto. Por favor, intenta nuevamente.');
        }
    }
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();
            return redirect()->route('gestionProductos.index')->with('deleted', 'Producto eliminado correctamente');
        } catch (\Throwable $th) {
            Log::error("Error al intentar eliminar: ' . $th->getMessage()");

            return redirect()->back()
                ->withInput()
                ->with('errordeleted', 'Ha ocurrido un error al eliminar el producto. Por favor, intenta nuevamente.');
        }
        
    }
}
