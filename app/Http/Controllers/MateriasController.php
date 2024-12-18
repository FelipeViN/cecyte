<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Obtener todas las materias visibles.
     */
    public function index()
    {
        $materias = Materias::where('visible', 1)->get();
        return response()->json($materias);
    }

    /**
     * Buscar materia por clave.
     */
    public function buscarPorClave($clave)
    {
        // Busca la materia sin importar el valor de 'visible'
        $materia = Materias::where('clave', $clave)->first();
    
        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada'], 404);
        }
    
        return response()->json($materia);
    }
    

    /**
     * Crear una nueva materia.
     */
    public function store(Request $request)
{
    // Validar los campos de entrada
    $request->validate([
        'clave' => 'required|string|max:10',
        'nombre' => 'required|string|max:255',
        'creditos' => 'required|integer|min:1|max:10',
        'semestre' => 'required|integer|min:1|max:6',
        'descripcion' => 'nullable|string|max:500',
    ]);

    // Buscar si la clave ya existe
    $materiaExistente = Materias::where('clave', $request->clave)->first();

    if ($materiaExistente) {
        if ($materiaExistente->visible === 0) {
            // Reactivar la materia si está oculta
            $materiaExistente->update([
                'nombre' => $request->nombre,
                'creditos' => $request->creditos,
                'semestre' => $request->semestre,
                'descripcion' => $request->descripcion,
                'visible' => 1, // Reactivarla
            ]);

            return response()->json(['message' => 'Materia reactivada correctamente', 'materia' => $materiaExistente], 200);
        }

        // Si la clave existe y está visible, devolver error
        return response()->json(['message' => 'La clave ya está en uso'], 422);
    }

    // Crear una nueva materia si no existe
    $materia = Materias::create(array_merge($request->all(), ['visible' => 1]));

    return response()->json(['message' => 'Materia creada correctamente', 'materia' => $materia], 201);
}

    /**
     * Actualizar una materia.
     */
    public function update(Request $request, $clave)
    {
        $materia = Materias::where('clave', $clave)->first();

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'creditos' => 'required|integer|min:1|max:10',
            'semestre' => 'required|integer|min:1|max:6',
            'descripcion' => 'nullable|string|max:500',
        ]);

        $materia->update($request->all());
        return response()->json(['message' => 'Materia actualizada correctamente', 'materia' => $materia]);
    }

    /**
     * Ocultar una materia (no eliminar físicamente).
     */
    public function destroy($clave)
    {
        $materia = Materias::where('clave', $clave)->first();

        if (!$materia) {
            return response()->json(['message' => 'Materia no encontrada'], 404);
        }

        $materia->update(['visible' => 0]);
        return response()->json(['message' => 'Materia marcada como no visible']);
    }
}
