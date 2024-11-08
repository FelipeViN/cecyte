<?php

namespace App\Http\Controllers;

use App\Models\estudiantes;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return estudiantes::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'usuarioID' => 'required',
            'matricula' => 'required|unique:estudiantes,matricula|digits:14|numeric', // Validación para 14 dígitos numéricos
            'semestre' => 'required',
        ], [
            'matricula.unique' => 'La matrícula ya está registrada. Por favor, use una diferente.',
            'matricula.digits' => 'La matrícula debe tener exactamente 14 dígitos.',
            'matricula.numeric' => 'La matrícula debe ser numérica.',
        ]);

        // Crear el estudiante si la matrícula es válida y única
        $estudiante = new estudiantes;
        $estudiante->usuarioID = $request->usuarioID;
        $estudiante->matricula = $request->matricula;
        $estudiante->semestre = $request->semestre;
        $estudiante->save();

        return response()->json([
            'message' => 'Estudiante creado exitosamente',
            'estudiante' => $estudiante
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante = estudiantes::find($id);
        if (is_null($estudiante)) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        return $estudiante;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'usuarioID' => 'required',
            'matricula' => 'required|unique:estudiantes,matricula,' . $id . '|digits:14|numeric', // Ignora la matrícula del estudiante actual
            'semestre' => 'required',
        ], [
            'matricula.unique' => 'La matrícula ya está registrada. Por favor, use una diferente.',
            'matricula.digits' => 'La matrícula debe tener exactamente 14 dígitos.',
            'matricula.numeric' => 'La matrícula debe ser numérica.',
        ]);

        $estudiante = estudiantes::find($id);
        if (is_null($estudiante)) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        $estudiante->usuarioID = $request->usuarioID;
        $estudiante->matricula = $request->matricula;
        $estudiante->semestre = $request->semestre;
        $estudiante->save();

        return response()->json([
            'message' => 'Estudiante actualizado exitosamente',
            'estudiante' => $estudiante
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = estudiantes::find($id);
        if (is_null($estudiante)) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        $estudiante->delete();
        return response()->json(['message' => 'Estudiante eliminado exitosamente'], 204);
    }
}
