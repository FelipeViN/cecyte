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
        return Materias::all();
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

        $materia = Materias::create([
            'nombre' => $request->nombre,
            'clave' => $request->clave,
            'creditos' => $request->creditos,
            'semestre' => $request->semestre,
        ]);

        return response()->json(['data' => $materia], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materia = Materias::find($id);

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada.'], 404);
        }

        return response()->json(['data' => $materia], 200);
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

        $materia = Materias::find($id);

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada.'], 404);
        }

        $materia->update([
            'nombre' => $request->nombre,
            'clave' => $request->clave,
            'creditos' => $request->creditos,
            'semestre' => $request->semestre,
        ]);

        return response()->json(['data' => $materia], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materia = Materias::find($id);

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada.'], 404);
        }

        $materia->delete();

        return response()->json(['message' => 'Materia eliminada.'], 200);
    }
}
