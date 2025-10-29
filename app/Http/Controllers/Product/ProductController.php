<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
public function index()
    {
        $products = Product::with(['category', 'provider'])->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $providers = Provider::all();
        return view('products.create', compact('categories', 'providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'categorie_id' => 'required|exists:categories,id',
            'provider_id' => 'nullable|exists:providers,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'specifications' => 'required|string',
            'stock_minimum' => 'required|integer|min:0',
        ]);

        Product::create([
            'user_id' => Auth::id(),
            'categorie_id' => $request->categorie_id,
            'provider_id' => $request->provider_id,
            'name' => $request->name,
            'description' => $request->description,
            'cod_prod' => $request->cod_prod ?? uniqid('PROD-'),            
            'specifications' => $request->specifications,
            'stock_minimum' => $request->stock_minimum,
            'stock' => $request->stock,
            'imagen_url' => $request->imagen_url,
            'brand' => $request->brand,
            'cant' => $request->cant ?? 0,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'active' => $request->active ?? true,
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $providers = Provider::all();
        return view('products.edit', compact('product', 'categories', 'providers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'categorie_id' => 'required|exists:categories,id',
            'provider_id' => 'nullable|exists:providers,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_minimum' => 'required|integer|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
