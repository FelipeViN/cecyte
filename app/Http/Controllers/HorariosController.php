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
            'horaInicio'=>'requiered',
            'horaFin'=>'requiered',
            'aula'=>'requiered',
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
            'horaInicio'=>'requiered',
            'horaFin'=>'requiered',
            'aula'=>'requiered',
        ]);
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
    public function destroy(horarios $horarios)
    {
        $horarios->delete();
        return response()->noContent();
    }
}
