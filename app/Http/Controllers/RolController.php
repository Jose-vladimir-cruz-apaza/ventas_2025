<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $rols = Rol::all();
        return view('rols.index', compact('rols'));
    }

    public function create()
    {
        return view('rols.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:rols,name|max:50',
            'description' => 'nullable|max:255',
        ]);

        Rol::create($request->all());

        return redirect()->route('rols.index')->with('success', 'Rol creado correctamente.');
    }

    public function edit(Rol $rol)
    {
        return view('rols.edit', compact('rol'));
    }

    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'name' => 'required|max:50|unique:rols,name,' . $rol->id,
            'description' => 'nullable|max:255',
        ]);

        $rol->update($request->all());

        return redirect()->route('rols.index')->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(Rol $rol)
    {
        $rol->delete();
        return redirect()->route('rols.index')->with('success', 'Rol eliminado correctamente.');
    }
}
