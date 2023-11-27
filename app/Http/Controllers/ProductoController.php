<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\View\View
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Ajusta los formatos y el tamaño según tus necesidades
            'categoria_id' => 'required|exists:categorias,id',
        ]);
    
        // Procesar y guardar la imagen
        $imagenPath = $request->file('imagen')->store('productos', 'public');
    
        // Crear el producto con la información del formulario y la ruta de la imagen
        Producto::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'imagen' => $imagenPath,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio
        ]);
    
        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
    * @param  \App\Models\Producto  $producto
 * @return \Illuminate\View\View
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
      *@param  \App\Models\Producto  $producto
 * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(Producto $product)
{
    $categories = Categoria::all();

    if ($product) {
        return view('productos.edit', compact('product', 'categories'));
    } else {
        // Redirige o muestra un error si el producto no se encuentra
        return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
    }
}

    /**
     * Update the specified resource in storage.
     *
     * * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Producto  $producto
 * @return \Illuminate\Http\RedirectResponse

     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Puedes ajustar las reglas para la imagen según tus necesidades
        ]);

        // Obtener el producto a actualizar
        $product = Producto::findOrFail($id);

        // Actualizar los campos del producto
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('image')) {
            // Guardar la nueva imagen en el storage y actualizar la ruta en la base de datos
            $imagePath = $request->file('image')->store('productos', 'public');
            $product->image = $imagePath;
        }

        // Guardar los cambios en la base de datos
        $product->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
 * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}
