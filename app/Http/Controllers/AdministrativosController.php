<?php

namespace App\Http\Controllers;

use App\Models\administrativos;
use Illuminate\Http\Request;

class AdministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return administrativos::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuarioID'=>'required',
            'departamento'=>'required',
            'cargo'=>'required',
        ]);
        $administrativos = new administrativos;
        $administrativos->usuarioID=$request->usuarioID;
        $administrativos->departamento=$request->departamento;
        $administrativos->cargo=$request->cargo;

        $administrativos->save();
        return $administrativos;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $administrativos = administrativos::find($id);
        return $administrativos;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, administrativos $administrativos)
    {
        $request->validate([
            'usuarioID'=>'required',
            'departamento'=>'required',
            'cargo'=>'required',
        ]);
        $administrativos = administrativos::find($id);
        if(is_null($administrativos)){
            return response()->json('No se pudo actualizar el objeto', 404);
        }
        $administrativos->usuarioID=$request->usuarioID;
        $administrativos->departamento=$request->departamento;
        $administrativos->cargo=$request->cargo;

        $administrativos->update();
        return $administrativos;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $administrativos = administrativos::find($id);
        if(is_null($administrativos)){
            return response()->json('No se pudo eliminar el objeto', 404);
        }
        $administrativos->delete();
        return response()->noContent();
    }
}
