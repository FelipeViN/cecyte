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
        $request->validate([
            'usuarioID'=>'required',
            'matricula'=>'required',
            'semestre'=>'required',
        ]);
        $estudiantes = new estudiantes;
        $estudiantes->usuarioID=$request->usuarioID;
        $estudiantes->matricula=$request->matricula;
        $estudiantes->semestre=$request->semestre;
        $estudiantes->save();
        return $estudiantes;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiantes = estudiantes::find($id);
        return $estudiantes;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, estudiantes $estudiantes)
    {
        $request->validate([
            'usuarioID'=>'required',
            'matricula'=>'required',
            'semestre'=>'required',
        ]);
        $estudiantes = estudiantes::find($id);
        if(is_null($estudiantes)){
            return response()->json('No se pudo actualizar el objeto', 404);
        }
        $estudiantes->usuarioID=$request->usuarioID;
        $estudiantes->matricula=$request->matricula;
        $estudiantes->semestre=$request->semestre;
        
        $estudiantes->update();
        return $estudiantes;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiantes = estudiantes::find($id);
        if(is_null($estudiantes)){
            return response()->json('No se pudo eliminar el objeto', 404);
        }
        $estudiantes->delete();
        return response()->noContent();
    }
}
