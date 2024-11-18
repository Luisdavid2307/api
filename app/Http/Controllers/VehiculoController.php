<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculos;

class VehiculosController extends Controller
{
    public function index()
    {
        return Vehiculos::all(); // Listar todos los productos
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombe_del_vehiculos' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);
    
        $vehiculos = Vehiculos::create($validated);
        return response()->json($vehiculos, 201);
    }

    public function show($id)
    {
        return Vehiculos::findOrFail($id); // Mostrar un producto específico
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre_del_vehiculos' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);
    
        $vehiculos = Vehiculos::findOrFail($id);
        $vehiculos->update($validated);
        return response()->json($vehiculos, 200);
    }

    public function destroy($id)
    {
        $vehiculos = Vehiculos::findOrFail($id);
        $vehiculo->delete(); // Eliminar el producto
        return response()->json(null, 204);
    }
}
