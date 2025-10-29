<?php

namespace App\Http\Controllers\SaleDetaor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function index()
    {
        $saleDetails = SaleDetail::with('sale', 'product')->get();
        return view('sale_details.index', compact('saleDetails'));
    }

    public function create()
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('sale_details.create', compact('sales', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,returned,canceled',
        ]);

        $product = Product::find($request->product_id);

        // 🧠 Verificar stock
        if ($product->stock < $request->quantity) {
            // Redirigir con mensaje de error
            return redirect()->back()->with('error', 'No hay suficiente stock disponible para este producto.');
        }

        // Calcular subtotal
        $subtotal = ($request->quantity * $request->unit_price) - ($request->discount ?? 0);

        // Crear el detalle de venta
        SaleDetail::create([
            'sale_id' => $request->sale_id,
            'product_id' => $request->product_id,
            'product_name' => $product->name,
            'product_code' => $product->cod_prod ?? null,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'discount' => $request->discount ?? 0,
            'subtotal' => $subtotal,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        // 🔽 Reducir el stock del producto
        $product->decrement('stock', $request->quantity);

        return redirect()->route('sale_details.index')->with('success', 'Detalle de venta creado correctamente.');
    }

    public function edit(SaleDetail $saleDetail)
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('sale_details.edit', compact('saleDetail', 'sales', 'products'));
    }

public function update(Request $request, SaleDetail $saleDetail)
{
    $request->validate([
        'sale_id' => 'required|exists:sales,id',
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0',
        'status' => 'required|in:active,returned,canceled',
    ]);

    $product = Product::find($request->product_id);
    $oldQuantity = $saleDetail->quantity;
    $newQuantity = $request->quantity;

    // 🔹 Calcular diferencia (nueva - antigua)
    $difference = $newQuantity - $oldQuantity;

    // 🧠 Si intenta vender más productos
    if ($difference > 0) {
        if ($product->stock < $difference) {
            // ❌ No hay suficiente stock
            return redirect()->back()->with('error', 'No hay suficiente stock disponible para aumentar la cantidad.');
        }

        // ✅ Reducir stock por la diferencia
        $product->decrement('stock', $difference);
    }
    // 🔄 Si reduce la cantidad (devolver productos al stock)
    elseif ($difference < 0) {
        $product->increment('stock', abs($difference));
    }

    // Calcular subtotal actualizado
    $subtotal = ($newQuantity * $request->unit_price) - ($request->discount ?? 0);

    // Actualizar el detalle
    $saleDetail->update([
        'sale_id' => $request->sale_id,
        'product_id' => $request->product_id,
        'product_name' => $product->name,
        'product_code' => $product->cod_prod ?? null,
        'quantity' => $newQuantity,
        'unit_price' => $request->unit_price,
        'discount' => $request->discount ?? 0,
        'subtotal' => $subtotal,
        'status' => $request->status,
        'notes' => $request->notes,
    ]);

    return redirect()->route('sale_details.index')->with('success', 'Detalle de venta actualizado correctamente.');
}



    public function destroy(SaleDetail $saleDetail)
    {
        $product = $saleDetail->product;

        if ($product) {
            $product->increment('stock', $saleDetail->quantity);
        }

        $saleDetail->delete();

        return redirect()->route('sale_details.index')->with('success', 'Detalle eliminado y stock restablecido correctamente.');
    }

}
