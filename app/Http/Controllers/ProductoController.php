<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;  
use App\Models\Categoria;


class ProductoController extends Controller
{


    public function index()
    {   

    $productos = Producto::with('categoria')->get();


    return view('productos.index', compact('productos'));
    }

    public function create()
{

    $categorias = Categoria::all();


    return view('productos.create', compact('categorias'));
}


public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'precio' => 'required|integer',
            'disponible' => 'nullable|boolean',
            'fecha_lanzamiento' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id', 
        ]);

        $disponible = $request->input('disponible', false);

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'disponible' => $disponible,
            'fecha_lanzamiento' => $request->fecha_lanzamiento,
            'categoria_id' => $request->categoria_id,
        ]);

        
        if ($producto) {
            return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
        } else {
            return back()->withErrors(['error' => 'Hubo un problema al guardar el producto.']);
        }
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'precio' => 'required|integer',
            'disponible' => 'required|boolean',
            'fecha_lanzamiento' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy($id)
    {

        $producto = Producto::find($id);

        if ($producto) {

            $producto->delete();
    

            return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
        } else {

            return redirect()->route('productos.index')->with('error', 'Producto no encontrado.');
        }
    }


    public function edit($id)
{

    $producto = Producto::find($id);


    if ($producto) {

        $categorias = Categoria::all();

        return view('productos.edit', compact('producto', 'categorias'));
    } else {
        return redirect()->route('productos.index')->with('error', 'Producto no encontrado.');
    }
}

}
