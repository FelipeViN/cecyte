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
        // Obtener todas las materias de la base de datos
        // Puedes elegir qué campos devolver. Aquí estoy seleccionando 'id', 'nombre', 'clave', 'creditos', 'semestre'
        $materias = Materias::select('id', 'nombre', 'clave', 'creditos', 'semestre')->get();
        return response()->json($materias);
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

        // Crear la nueva materia
        $materia = materias::create($request->all());

        return response()->json([
            'message' => 'Materia creada correctamente.',
            'data' => $materia
        ], 201); // Respuesta con estado 201 (creado)
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Busca la materia por su ID
        $materia = materias::find($id);

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada'], 404);
        }

        return response()->json($materia);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validaciones
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave' => 'required|string|max:10|unique:materias,clave,' . $id,
            'creditos' => 'required|integer|min:1',
            'semestre' => 'required|integer|min:1|max:12',
        ]);

        // Encuentra la materia
        $materia = materias::find($id);

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada'], 404);
        }

        // Actualiza la materia
        $materia->update($request->all());

        return response()->json([
            'message' => 'Materia actualizada correctamente.',
            'data' => $materia
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encuentra la materia por ID
        $materia = materias::find($id);

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada'], 404);
        }

        // Elimina la materia
        $materia->delete();

        return response()->json(['message' => 'Materia eliminada correctamente']);
    }
}
