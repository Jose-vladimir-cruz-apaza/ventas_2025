<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {                        
        $products = Product::with('category')->get();       
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Necesitamos las categorías para el select
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'codigo_product' => 'required|string|unique:products,codigo_product',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable',
            'category_id' => 'required|exists:categories,id'
        ]);

        // // Manejo de la imagen si se sube
        // if ($request->hasFile('imagen')) {
        //     $path = $request->file('imagen')->store('products', 'public');
        //     $validated['imagen'] = $path;
        // }

        Product::create($validated);
        return redirect()->route('product.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Para mostrar en el select
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'codigo_product' => 'required|string|unique:products,codigo_product,' . $product->id,
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable',
            'category_id' => 'required|exists:categories,id'
        ]);

        // if ($request->hasFile('imagen')) {
        //     $path = $request->file('imagen')->store('products', 'public');
        //     $validated['imagen'] = $path;
        // }

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {        
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Producto eliminado correctamente.');
    }
}
