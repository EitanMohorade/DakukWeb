<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\SubSubCategoria;
use App\Models\SubCategoria;


class CategoriaController extends Controller
{
    //
    public function show(){
        $categorias = Categoria::all();
        $subCategorias = SubCategoria::all();
        $subSubCategorias = SubSubCategoria::all();
        return view("Eitan.productos.categorias.agregarVerCategorias",["categorias"=> $categorias, "subSubCategorias"=> $subSubCategorias, "subCategorias"=> $subCategorias]);
    }
    //
    public function store(Request $request){
        $categoria = new Categoria;
        $subCategoria = new SubCategoria;
        $subSubCategoria = new SubSubCategoria;

        if($request->input('NombreC') != null){
            $categoria->Nombre = $request->input('NombreC');
            $categoria->save();
        }
        if($request->input('NombreSC')!= null){
            $subCategoria->Nombre = $request->input('NombreSC');
            $subCategoria->Categoria = $request->input('SubCategoria');
            $subCategoria->save();
        }
        if($request->input('NombreSSC')!= null){
            $subSubCategoria->Nombre = $request->input('NombreSSC');
            $subSubCategoria->SubCategoria = $request->input('SubSubCategoria');
            $subSubCategoria->save();
        }
        
        return redirect()->route('verCategorias')->with('success','categoria agregada');
    }
    //
    public function destroyC($id){
        $categoria = Categoria::find($id);
        if($categoria != null){
            $categoria->delete();
            return redirect()->back()->with('success','categoria eliminado');
        }
        return redirect()->back()->with('Message','ID EQUIVOCADO');
    }
    public function destroySC($id){
        $subCategoria = SubCategoria::find($id);
        if($subCategoria != null){
            $subCategoria->delete();
            return redirect()->back()->with('success','categoria eliminado');
        }
        return redirect()->back()->with('Message','ID EQUIVOCADO');
    }
    public function destroySSC($id){
        $subSubCategoria = SubSubCategoria::find($id);
        if($subSubCategoria != null){
            $subSubCategoria->delete();
            return redirect()->back()->with('success','categoria eliminado');
        }
        return redirect()->back()->with('Message','ID EQUIVOCADO');
    }
}
