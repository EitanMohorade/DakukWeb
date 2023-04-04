<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //
    public function store(Request $request){
        $usuario = new Usuario;

        $request->validate([
           'nombre'=>'required|min:3|max:20' 
        ]);

        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->contraseña = $request->input('contraseña');
        $usuario->save();
        return redirect('verUsuarios')->with('success','usuario agregado');
    }
    //
    public function destroy($id){
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect()->back()->with('success','usuario eliminado');
    }
    //
    public function update(Request $request, $id){
        $usuario = Usuario::find($id);
        $usuario->Nombre = $request->input('Nombre');
        $usuario->Apellido = $request->input('Apellido');
        $usuario->Email = $request->input('Email');
        $usuario->Contraseña = $request->input('Contraseña');
        $usuario->update();
        return redirect()->back()->with('success','usuario actualizado');
    }
    //
    public function edit($id){
        $usuario = Usuario::find($id);
        return view('Eitan.usuarios.editarUsuario', compact('usuario'));

    }
    //
    public function show(){
        $usuarios = Usuario::all();
        return view("Eitan.usuarios.verUsuarios",["usuarios"=> $usuarios]);
    }
}
