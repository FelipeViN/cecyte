<?php

namespace App\Http\Controllers;

use App\Models\profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return profesores::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuarioID'=>'required',
            'numeroEmpleado'=>'required',
            'especialidad'=>'required',
        ]);
        $profesores = new profesores;
        $profesores->usuarioID=$request->usuarioID;
        $profesores->numeroEmpleado=$request->numeroEmpleado;
        $profesores->especialidad=$request->especialidad;
        $profesores->save();
        return $profesores;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profesores = profesores::find($id);
        return $profesores;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, profesores $profesores)
    {
        $request->validate([
            'usuarioID'=>'required',
            'numeroEmpleado'=>'required',
            'especialidad'=>'required',
        ]);
        $profesores = profesores::find($id);
        if(is_null($profesores)){
            return response()->json('No se pudo actualizar el objeto', 404);
        }
        $profesores->usuarioID=$request->usuarioID;
        $profesores->numeroEmpleado=$request->numeroEmpleado;
        $profesores->especialidad=$request->especialidad;
        $profesores->update();
        return $profesores;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profesores = profesores::find($id);
        if(is_null($profesores)){
            return response()->json('No se pudo eliminar el objeto', 404);
        }
        $profesores->delete();
        return response()->noContent();
    }
}
