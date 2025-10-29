<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('Provider.index', compact('providers'));
    }

    public function create()
    {
        return view('provider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'company' => 'required|string|max:100',
            'contact' => 'nullable|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'direction' => 'required|string|max:255',
            'NIT' => 'required|string|max:20',
        ]);

        Provider::create($request->all());

        return redirect()->route('provider.index')->with('success', 'Proveedor creado correctamente.');
    }

    public function show(Provider $provider)
    {
        return view('provider.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('provider.edit', compact('provider'));
    }

    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'company' => 'required|string|max:100',
            'contact' => 'nullable|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'direction' => 'required|string|max:255',
            'NIT' => 'required|string|max:20',
        ]);

        $provider->update($request->all());

        return redirect()->route('provider.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('provider.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
