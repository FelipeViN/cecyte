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
    public function show($id)
    {
        $grupos = grupos::find($id);
        return $grupos;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required',
            'cicloEscolar'=>'required',
        ]);
        $grupos = grupos::find($id);
        if(is_null($grupos)){
            return response()->json('No se pudo actualizar el objeto', 404);
        }
        $grupos->nombre=$request->nombre;
        $grupos->cicloEscolar=$request->cicloEscolar;

        $grupos->update();
        return $grupos;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grupos = grupos::find($id);
        if(is_null($grupos)){
            return response()->json('No se pudo eliminar el objeto', 404);
        }
        $grupos->delete();
        return response()->noContent();
    }
}
