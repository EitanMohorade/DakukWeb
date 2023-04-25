<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\ValidationRules;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        if($user->hasRole('admin')){
            return view('admin.products.index');
        }elseif($user->hasRole('customer')) {
            return view('products.index');
        }else{
            return view('admin.categories.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.products.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::user());
        if ($user->hasRole('admin')) {
            // Validating product props
            $request->validate(ValidationRules::productRules());

            //$imagePath = $request->file('image')->store('storage', 'public'); // Saving the image path
            /*$imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage'), $imageName);*/

            $imageName = time() . '-' . $request->name . '.' .
            $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $products = Product::create([
                'name' => $request->name,
                //'category_id' => 1,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' =>  $imageName,//$request->image,//$image_path = $imagePath,
            ]);
            return to_route('products.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (Auth::check()) {
            $user = User::find(Auth::user());
            if ($user->hasRole('admin')) {
                return view('admin.products.show', ['product' => $product]);
            }
        } else {
            return view('products.show', ['product' => $product]);
        }
    }
    /**
     * Search an specific register.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->get();

        return view('admin.products.index', ['products' => $products]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $product = Product::find($id);
        if(!$product->trashed()){
            Product::find($id)->delete();
            $status = 'Producto eliminado exitosamente';
        }
        else{
            $status = 'No se puede borrar un producto ya eliminado o inexistente';
        }
        return to_route('products.index')->with('status', $status);
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        if($product->trashed()){
            $product->restore();
            $status = 'Producto restaurado exitosamente';
        }
        else{
            $status = 'No se puede restaurar un producto activo o inexistente';
        }

        return to_route('products.index')->with('status', $status);
    }
}
