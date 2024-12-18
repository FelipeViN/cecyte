<?php

namespace App\Http\Controllers;

use App\Models\Materias;  // Asegúrate de que el modelo esté correctamente importado
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource (solo materias visibles).
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave' => 'required|string|max:10|unique:materias,clave',
            'creditos' => 'required|integer|min:1',
            'semestre' => 'required|integer|min:1|max:12',
            'descripcion' => 'nullable|string|max:500', // Descripción ahora es opcional
        ]);

        // Crear la nueva materia
        $materia = materias::create($request->all());

        return response()->json([
            'message' => 'Materia creada correctamente.',
            'data' => $materia
        ], 201); // Respuesta con estado 201 (creado)
    }



    /**
     * Buscar materia por clave (para el modal de Angular).
     */
    public function buscarPorClave($clave)
    {
        // Busca la materia sin importar el valor de 'visible'
        $materia = Materias::where('clave', $clave)->first();

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada.'], 404);
        }

        return response()->json(['data' => $materia], 200);
    }


    /**
     * Update the specified resource in storage (actualizar por clave).
     */
    public function update(Request $request, $clave)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave' => 'required|string|max:10|unique:materias,clave,' . $clave . ',clave',
            'creditos' => 'required|integer|min:1',
            'semestre' => 'required|integer|min:1|max:12',
            'descripcion' => 'nullable|string|max:500',
        ]);

        // Encuentra la materia por clave
        $materia = Materias::where('clave', $clave)->first();

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
     * Remove the specified resource from storage (ocultar en lugar de eliminar).
     */
    public function destroy($clave)
    {
        $materia = Materias::where('clave', $clave)->first();

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada.'], 404);
        }

        // Elimina la materia
        $materia->delete();

        return response()->json(['message' => 'Materia eliminada correctamente']);
    }
}
