<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\SubSubCategoria;
use App\Models\SubCategoria;

class ProductosController extends Controller
{
    //
    public function show(Request $request){
        $categorias = Categoria::all();
        $subCategorias = SubCategoria::all();
        $subSubCategorias = SubSubCategoria::all();
        //$categoria = $request->input('Categoria');
        if($request->Categoria != null){
            $productos = Producto::where('Categoria', $request->Categoria)->get();
        }else if($request->SubCategoria != null){
            $productos = Producto::where('SubCategoria', $request->SubCategoria)->get();
        }else{
            $productos = Producto::all();
        }
        return view("Eitan.productos.verProductos",["productos"=> $productos, "categorias"=> $categorias, "subSubCategorias"=> $subSubCategorias, "subCategorias"=> $subCategorias]);
    }
    //
    public function showCategorys(){
        $categorias = Categoria::all();
        $subCategorias = SubCategoria::all();
        $subSubCategorias = SubSubCategoria::all();
        return view("Eitan.productos.agregarProductos",["categorias"=> $categorias, "subSubCategorias"=> $subSubCategorias, "subCategorias"=> $subCategorias]);
    }
    //
    public function store(Request $request){
        $producto = new Producto;
        $producto->Nombre = $request->input('Nombre');
        $producto->Descripcion = $request->input('Descripcion');

       if($request->input('Categoria') != null){
            $producto->Categoria = $request->input('Categoria');
        }
        if($request->input('SubCategoria')!= null){
            $producto->SubCategoria = $request->input('SubCategoria');
        }
        if($request->input('SubSubCategoria')!= null){
            $producto->SubSubCategoria = $request->input('SubSubCategoria');
        }

        if($request->hasFile('Imagen')){
            $destino ='public/images/productos';
            $imagen = $request->file('Imagen');
            $nombreImagen = $imagen->getClientOriginalName();
            $path =$request->file('Imagen')->storeAs($destino, $nombreImagen);

            $producto -> Imagen = $nombreImagen;
        }

        $producto->save();
        return redirect()->route('agregarProducto')->with('success','producto agregado');
    }
    //
    public function edit($id){
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $subCategorias = SubCategoria::all();
        $subSubCategorias = SubSubCategoria::all();
        
        return view('Eitan.productos.editarProducto', compact('producto'), ["categorias"=> $categorias, "subSubCategorias"=> $subSubCategorias, "subCategorias"=> $subCategorias]);
    }
    //
    public function update(Request $request, $id){
        $producto = Producto::find($id);
        $producto->Nombre = $request->input('Nombre');
        $producto->Descripcion = $request->input('Descripcion');

        if($request->input('Categoria') != null){
            $producto->Categoria = $request->input('Categoria');
        }
        if($request->input('SubCategoria')!= null){
            $producto->SubCategoria = $request->input('SubCategoria');
        }
        if($request->input('SubSubCategoria')!= null){
            $producto->SubSubCategoria = $request->input('SubSubCategoria');
        }

        if($request->hasFile('Imagen')){
            $destino ='public/images/productos';
            $imagen = $request->file('Imagen');
            $nombreImagen = $imagen->getClientOriginalName();
            $path =$request->file('Imagen')->storeAs($destino, $nombreImagen);

            $producto -> Imagen = $nombreImagen;
        }

        $producto->update();
        return redirect()->back()->with('success','producto actualizado');
    }
    //
    public function destroy($id){
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->back()->with('success','producto eliminado');
    }
}
