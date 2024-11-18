<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function index()
    {
        return Vehiculo::all(); // Listar todos los productos
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombe_del_vehiculo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);
    
        $vehiculo = Vehiculo::create($validated);
        return response()->json($vehiculo, 201);
    }

    public function show($id)
    {
        return Vehiculo::findOrFail($id); // Mostrar un producto específico
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre_del_vehiculo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);
    
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($validated);
        return response()->json($vehiculo, 200);
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete(); // Eliminar el producto
        return response()->json(null, 204);
    }
}
