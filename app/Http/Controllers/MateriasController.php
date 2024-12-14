<?php

namespace App\Http\Controllers;

use App\Models\Materias;  // Asegúrate de que el modelo esté correctamente importado
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = materias::all();
        return view('materias.index', compact('materias'));
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
        // Validaciones
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave' => 'required|string|max:10|unique:materias,clave',
            'creditos' => 'required|integer|min:1',
            'semestre' => 'required|integer|min:1|max:12',
        ]);

        materias::create($request->all()); 

        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('materias.show', compact('materia'));
    }

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada'], 404);
        }

        return response()->json($materia);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, materias $materia) 
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave' => 'required|string|max:10|unique:materias,clave,' . $materia->id,
            'creditos' => 'required|integer|min:1',
            'semestre' => 'required|integer|min:1|max:12',
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(materias $materia) // Cambié "Materia" a "materias"
    {
        $materia->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }
}
