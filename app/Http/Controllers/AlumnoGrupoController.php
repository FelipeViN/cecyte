<?php

namespace App\Http\Controllers;

use App\Models\grupos;
use App\Models\estudiantes;
use Illuminate\Http\Request;

class AlumnoGrupoController extends Controller
{
    /**
     * Muestra los estudiantes de un grupo específico.
     */
    public function index($grupoId)
{
    $grupo = grupos::find($grupoId);

    if (!$grupo) {
        return response()->json(['message' => 'Grupo no encontrado'], 404);
    }

    return response()->json($grupo->estudiantes, 200);
}

    /**
     * Agrega un estudiante a un grupo.
     */
    public function store(Request $request, $grupoId)
    {
        $grupo = grupos::find($grupoId);

        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
        ]);

        $grupo->estudiantes()->attach($request->estudiante_id);

        return response()->json(['message' => 'Estudiante agregado al grupo correctamente'], 200);
    }

    /**
     * Elimina un estudiante de un grupo.
     */
    public function destroy($grupoId, $estudianteId)
    {
        $grupo = grupos::find($grupoId);

        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        $grupo->estudiantes()->detach($estudianteId);

        return response()->json(['message' => 'Estudiante eliminado del grupo correctamente'], 200);
    }
}

