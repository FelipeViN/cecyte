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
            'tipoEvaluacion'=>'required',
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
    public function show($id)
    {
        $calificaciones = calificaciones::find($id);
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
            'tipoEvaluacion'=>'required',
        ]);
        $calificaciones = calificaciones::find($id);
        if(is_null($calificaciones)){
            return response()->json('No se pudo actualizar el objeto', 404);
        }
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
    public function destroy($id)
    {
        $calificaciones = calificaciones::find($id);
        if(is_null($calificaciones)){
            return response()->json('No se pudo eliminar el objeto', 404);
        }
        $calificaciones->delete();
        return response()->noContent();
    }
}
