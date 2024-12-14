<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Validation;

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
            'contraseña'=>'required',
            'tipoUsuario'=>'required',
            'Estatus'=>'required'
        ]);

        $usuarios = new usuarios;
        $usuarios->nombre=$request->nombre;
        $usuarios->apellidoPaterno=$request->apellidoPaterno;
        $usuarios->apellidoMaterno=$request->apellidoMaterno;
        $usuarios->email=$request->email;
        $usuarios->contraseña=$request->contraseña;
        $usuarios->tipoUsuario=$request->tipoUsuario;
        $usuarios->Estatus=$request->Estatus;
        
        $usuarios->save();
        return $usuarios;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuarios = usuarios::find($id);
        return $usuarios;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required',
            'apellidoPaterno'=>'required',
            'apellidoMaterno'=>'required',
            'email'=>'required',
            'contraseña'=>'required',
            'tipoUsuario'=>'required',
            'Estatus'=>'required'
        ]);
        $usuarios = usuarios::find($id); 

        if (!$usuarios) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        $usuarios->nombre=$request->nombre;
        $usuarios->apellidoPaterno=$request->apellidoPaterno;
        $usuarios->apellidoMaterno=$request->apellidoMaterno;
        $usuarios->email=$request->email;
        $usuarios->contraseña=$request->contraseña;
        $usuarios->tipoUsuario=$request->tipoUsuario;
        $usuarios->Estatus=$request->Estatus;
        $usuarios->update();
      
        return $usuarios;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuarios = usuarios::find($id);
        if(is_null($usuarios)){
            return response()->json('No se pudo eliminar el objeto', 404);
        }
        $usuarios->delete();
        return response()->noContent();
    }
}
