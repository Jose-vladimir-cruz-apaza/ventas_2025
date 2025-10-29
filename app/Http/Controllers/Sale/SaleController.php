<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
     /**
     * Muestra todas las ventas
     */
    public function index()
    {
        $sales = Sale::with('client', 'user')->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Muestra el formulario de creación
     */
    public function create()
    {
        $clients = Client::all();
        return view('sales.create', compact('clients'));
    }

    /**
     * Guarda una nueva venta
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'total_sale' => 'required|numeric|min:0',
            'state' => 'required|in:pendiente,completada,cancelada',
            'payment_method' => 'nullable|in:efectivo,tarjeta,qr',
            'factura' => 'nullable|string|max:50',
        ]);

        Sale::create([
            'user_id' => Auth::id(),
            'client_id' => $request->client_id,
            'total_sale' => $request->total_sale,
            'date_sale' => now(),
            'state' => $request->state,
            'payment_method' => $request->payment_method,
            'factura' => $request->factura,
        ]);

        return redirect()->route('sales.index')->with('success', 'Venta creada correctamente.');
    }

    /**
     * Muestra una venta específica
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Muestra el formulario para editar
     */
    public function edit(Sale $sale)
    {
        $clients = Client::all();
        return view('sales.edit', compact('sale', 'clients'));
    }

    /**
     * Actualiza una venta
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'total_sale' => 'required|numeric|min:0',
            'state' => 'required|in:pendiente,completada,cancelada',
            'payment_method' => 'nullable|in:efectivo,tarjeta,qr',
            'factura' => 'nullable|string|max:50',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Venta actualizada correctamente.');
    }

    /**
     * Elimina una venta
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Venta eliminada correctamente.');
    }
}
