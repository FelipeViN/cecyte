<?php

namespace App\Http\Controllers;

use App\Models\materias; 
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return materias::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave' => 'required|string|max:10|unique:materias,clave',
            'creditos' => 'required|integer|min:1',
            'semestre' => 'required|integer|min:1|max:12',
        ]);
        $materias = new materias;
        $materias->nombre = $request->nombre;
        $materias->clave = $request->clave; 
        $materias->creditos = $request->creditos;   
        $materias->semestre = $request->semestre;
        $materias->save();  
        return $materias;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materia = materias::find($id);
        return $materia;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(materias $materia) 
    {
        return view('materias.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'clave' => 'required|string|max:10|unique:materias,clave,' . $id,
        'creditos' => 'required|integer|min:1',
        'semestre' => 'required|integer|min:1|max:12',
    ]);

    // Buscar la materia por ID
    $materia = materias::find($id);
    if (!$materia) {
        return response()->json(['message' => 'Materia no encontrada.'], 404);
    }

    // Actualizar los datos de la materia
    $materia->nombre = $request->nombre;
    $materia->clave = $request->clave;
    $materia->creditos = $request->creditos;
    $materia->semestre = $request->semestre;
    $materia->save();

    return response()->json(['data' => $materia], 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // Cambié "Materia" a "materias"
    {
        $materia = materias::find($id);
        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada.'], 404);
        }
        $materia->delete();
        return response()->json(['message' => 'Materia eliminada.']);
    }
}
