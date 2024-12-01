<?php

namespace App\Http\Controllers;

use App\Models\horarios;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return horarios::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grupoID'=>'required',
            'materiaID'=>'required',
            'profesorID'=>'required',
            'diaSemana'=>'required',
            'horaInicio'=>'required',
            'horaFin'=>'required',
            'aula'=>'required',
        ]);
        $horarios = new horarios;
        $horarios->grupoID=$request->grupoID;
        $horarios->materiaID=$request->materiaID;
        $horarios->profesorID=$request->profesorID;
        $horarios->diaSemana=$request->diaSemana;
        $horarios->horaInicio=$request->horaInicio;
        $horarios->horaFin=$request->horaFin;

        $horarios->save();
        return $horarios;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horarios = horarios::find($id);
        return $horarios;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, horarios $horarios)
    {
        $request->validate([
            'grupoID'=>'required',
            'materiaID'=>'required',
            'profesorID'=>'required',
            'diaSemana'=>'required',
            'horaInicio'=>'required',
            'horaFin'=>'required',
            'aula'=>'required',
        ]);
        $horarios = horarios::find($id);
        if(is_null($horarios)){
            return response()->json('No se pudo actualizar el objeto', 404);
        }
        $horarios->grupoID=$request->grupoID;
        $horarios->materiaID=$request->materiaID;
        $horarios->profesorID=$request->profesorID;
        $horarios->diaSemana=$request->diaSemana;
        $horarios->horaInicio=$request->horaInicio;
        $horarios->horaFin=$request->horaFin;

        $horarios->update();
        return $horarios;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $horarios = horarios::find($id);
        if(is_null($horarios)){
            return response()->json('No se pudo eliminar el objeto', 404);
        }
        $horarios->delete();
        return response()->noContent();
    }
}
