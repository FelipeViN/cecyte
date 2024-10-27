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
            'numeroEmpleado'=>'requiered',
            'especialidad'=>'required',
        ]);
        $profesores = new usuarios;
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
            'numeroEmpleado'=>'requiered',
            'especialidad'=>'required',
        ]);

        $profesores->usuarioID=$request->usuarioID;
        $profesores->numeroEmpleado=$request->numeroEmpleado;
        $profesores->especialidad=$request->especialidad;
        $profesores->update();
        return $profesores;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(profesores $profesores)
    {
        $profesores->delete();
        return response()->noContent();
    }
}
