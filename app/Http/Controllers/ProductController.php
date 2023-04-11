<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$products = Product::all();
        return view('admin.products.index', ['products' => $products]);*/
        return view('admin.products.index');
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
        // Validating product props
        $request->validate([
            'name' => 'required', //WITH: |alpha_num:ascii|min:3|max:255 THERE IS AN ERROR
            //'category_id' => ['required|numeric|gt:0'],
            'description' => 'required', //WITH: |alpha_num:ascii|min:3|max:1024 THERE IS AN ERROR
            'price' => 'required', //WITH |numeric|gt:0 THERE IS AN ERROR
            'stock' => 'required',
            'image' => 'required|image|dimensions:min_width=100,min_height=100'
        ]);

        // $category = Category::find($request->category_id);
        $imagePath = $request->file('image')->store('storage', 'public'); // Saving the image path
        $products = Product::create([
            'name' => $request->name,
            //'category_id' => 1,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $image_path = $imagePath,
        ]);
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.products.index', ['products' => $products]);
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
//     public function destroy($id)
//     {
//         $product = Product::find($id)->delete();
// /*         if ($id == 'all') {
//             $product->update(['deleted_at' => now()]);
//         }else{ */
//             // $product>de-lete();
//         //}
//         return to_route('admin.products.index');
//     }
    
    public function restore($id)
    {
        if (Product::withTrashed()->find($id)->trashed()) {
            Product::withTrashed()->find($id)->restore();
        }else{
            Product::find($id)->delete();
        }
        return to_route('products.index');
    }
}
