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
        return grupos::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'cicloEscolar'=>'required',
        ]);
        $grupos = new grupos;
        $grupos->nombre=$request->nombre;
        $grupos->cicloEscolar=$request->cicloEscolar;

        $grupos->save();
        return $grupos;
    }

    /**
     * Display the specified resource.
     */
    public function show(grupos $grupos)
    {
        return $grupos;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, grupos $grupos)
    {
        $request->validate([
            'nombre'=>'required',
            'cicloEscolar'=>'required',
        ]);
        $grupos->nombre=$request->nombre;
        $grupos->cicloEscolar=$request->cicloEscolar;

        $grupos->update();
        return $grupos;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grupos $grupos)
    {
        $grupos->delete();
        return response()->noContent();
    }
}
