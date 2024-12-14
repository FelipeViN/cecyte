<?php

namespace App\Http\Controllers;

use App\Models\CalificacionEducativa;
use Illuminate\Http\Request;

class CalificacionEducativaController extends Controller
{
    // Mostrar todas las calificaciones
    public function index()
    {
        $calificaciones = CalificacionEducativa::all();
        return response()->json($calificaciones);
    }

    // Crear una nueva calificación
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'grupo_id' => 'required|exists:grupos,id',
            'primera_evaluacion' => 'required|numeric',
            'segunda_evaluacion' => 'required|numeric',
            'evaluacion_final' => 'required|numeric',
        ]);

        $calificacion = CalificacionEducativa::create([
            'estudiante_id' => $request->estudiante_id,
            'grupo_id' => $request->grupo_id,
            'primera_evaluacion' => $request->primera_evaluacion,
            'segunda_evaluacion' => $request->segunda_evaluacion,
            'evaluacion_final' => $request->evaluacion_final,
        ]);

        return response()->json($calificacion, 201);
    }

    // Mostrar una calificación por su ID
    public function show($id)
    {
        $calificacion = CalificacionEducativa::find($id);

        if (!$calificacion) {
            return response()->json(['message' => 'Calificación no encontrada'], 404);
        }

        return response()->json($calificacion);
    }

    // Actualizar una calificación existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'primera_evaluacion' => 'required|numeric',
            'segunda_evaluacion' => 'required|numeric',
            'evaluacion_final' => 'required|numeric',
        ]);

        $calificacion = CalificacionEducativa::find($id);

        if (!$calificacion) {
            return response()->json(['message' => 'Calificación no encontrada'], 404);
        }

        $calificacion->update([
            'primera_evaluacion' => $request->primera_evaluacion,
            'segunda_evaluacion' => $request->segunda_evaluacion,
            'evaluacion_final' => $request->evaluacion_final,
        ]);

        return response()->json($calificacion);
    }

    // Eliminar una calificación
    public function destroy($id)
    {
        $calificacion = CalificacionEducativa::find($id);

        if (!$calificacion) {
            return response()->json(['message' => 'Calificación no encontrada'], 404);
        }

        $calificacion->delete();

        return response()->json(['message' => 'Calificación eliminada']);
    }
}
