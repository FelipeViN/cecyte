<?php
namespace App\Http\Controllers;

use App\Models\grupos;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos los grupos con sus datos
        return grupos::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255|unique:grupos,nombre', // Valida que el nombre sea único
            'cicloEscolar' => 'required|string|max:255',
            'semestre' => 'required|integer|min:1|max:6', // Validamos el semestre
        ]);

        // Crear un nuevo grupo con los datos
        $grupos = new grupos;
        $grupos->nombre = $request->nombre;
        $grupos->cicloEscolar = $request->cicloEscolar;
        $grupos->semestre = $request->semestre;

        $grupos->save();

        return $grupos;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Busca el grupo por ID y lo retorna
        $grupos = grupos::find($id);

        if (is_null($grupos)) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        return $grupos;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Busca el grupo por ID
        $grupos = grupos::find($id);
        if (is_null($grupos)) {
            return response()->json(['message' => 'No se pudo actualizar el objeto, no encontrado'], 404);
        }

        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255|unique:grupos,nombre,' . $id, // Valida unicidad excluyendo el registro actual
            'cicloEscolar' => 'required|string|max:255',
            'semestre' => 'required|integer|min:1|max:6', // Validamos el semestre
        ]);

        // Actualiza los datos del grupo
        $grupos->nombre = $request->nombre;
        $grupos->cicloEscolar = $request->cicloEscolar;
        $grupos->semestre = $request->semestre;

        $grupos->update();

        return $grupos;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca el grupo por ID
        $grupos = grupos::find($id);
        if (is_null($grupos)) {
            return response()->json(['message' => 'No se pudo eliminar el objeto, no encontrado'], 404);
        }

        $grupos->delete();

        return response()->json(['message' => 'Grupo eliminado correctamente'], 204);
    }
}
