<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return usuarios::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellidoPaterno'=>'required',
            'apellidoMaterno'=>'required',
            'email'=>'required',
            'contraseña'=>'requiered',
            'tipoUsuario'=>'required',
        ]);
        $usuarios = new usuarios;
        $usuarios->nombre=$request->nombre;
        $usuarios->apellidoPaterno=$request->apellidoPaterno;
        $usuarios->apellidoMaterno=$request->apellidoMaterno;
        $usuarios->email=$request->email;
        $usuarios->contraseña=$request->contraseña;
        $usuarios->tipoUsuario=$request->tipoUsuario;
        
        $usuarios->save();
        return $usuarios;
    }

    /**
     * Display the specified resource.
     */
    public function show(usuarios $usuarios)
    {
        return $usuarios;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuarios $usuarios)
    {
        $request->validate([
            'nombre'=>'required',
            'apellidoPaterno'=>'required',
            'apellidoMaterno'=>'required',
            'email'=>'required',
            'contraseña'=>'requiered',
            'tipoUsuario'=>'required',
        ]);
        $usuarios->nombre=$request->nombre;
        $usuarios->apellidoPaterno=$request->apellidoPaterno;
        $usuarios->apellidoMaterno=$request->apellidoMaterno;
        $usuarios->email=$request->email;
        $usuarios->contraseña=$request->contraseña;
        $usuarios->tipoUsuario=$request->tipoUsuario;
        
        $usuarios->update();
        return $usuarios;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuarios $usuarios)
    {
        $usuarios->delete();
        return \response()->noContent();
    }
}
