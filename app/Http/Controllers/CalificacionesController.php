<?php

namespace App\Http\Controllers;

use App\Models\calificaciones;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return calificaciones::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estudianteID'=>'required',
            'materiaID'=>'required',
            'profesorID'=>'required',
            'calificacion'=>'required',
            'tipoEvaluacion'=>'requiered',
        ]);
        $calificaciones = new calificaciones;
        $calificaciones->estudianteID=$request->estudianteID;
        $calificaciones->materiaID=$request->materiaID;
        $calificaciones->profesorID=$request->profesorID;
        $calificaciones->calificion=$request->calificacion;
        $calificaciones->tipoEvaluacion=$request->tipoEvaluacion;

        $calificaciones->save();
        return $calificaciones;
    }

    /**
     * Display the specified resource.
     */
    public function show(calificaciones $calificaciones)
    {
        return $calificaciones;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, calificaciones $calificaciones)
    {
        $request->validate([
            'estudianteID'=>'required',
            'materiaID'=>'required',
            'profesorID'=>'required',
            'calificacion'=>'required',
            'tipoEvaluacion'=>'requiered',
        ]);
        $calificaciones->estudianteID=$request->estudianteID;
        $calificaciones->materiaID=$request->materiaID;
        $calificaciones->profesorID=$request->profesorID;
        $calificaciones->calificion=$request->calificacion;
        $calificaciones->tipoEvaluacion=$request->tipoEvaluacion;

        $calificaciones->update();
        return $calificaciones;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(calificaciones $calificaciones)
    {
        $calificaciones->delete();
        return response()->noContent();
    }
}
