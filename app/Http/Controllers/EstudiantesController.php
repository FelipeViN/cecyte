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
            'matricula'=>'requiered',
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
            'matricula'=>'requiered',
            'semestre'=>'required',
        ]);
        $estudiantes->usuarioID=$request->usuarioID;
        $estudiantes->matricula=$request->matricula;
        $estudiantes->semestre=$request->semestre;
        
        $estudiantes->update();
        return $estudiantes;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estudiantes $estudiantes)
    {
        $estudiantes->delete();
        return response()->noContent();
    }
}
