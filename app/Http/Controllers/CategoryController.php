<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all();
    return view('admin.categories.index', [
      'categories' => $categories,
    ]);
  }
  /**
   * Display the specified resource.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
    $id = $request->get('id');
    $category = Category::findOrFail($id);
    return view('admin.products.show', [
      "category" => $category,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('admin.categories.create', [
      'categories' => $categories,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required', //|alpha_num:ascii|min:3|max:255
      'category_id' => 'required'
    ]);

    $category = Category::create([
      'name' => $request->name,
      'category_id' => $request->category_id,
    ]);

    return to_route('categories.index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request)
  {
    $id = $request->get('id');
    $category = Category::findOrFail($id);
    return view('admin.categories.edit', ['category' => $category]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $categories = Category::findOrFail($id);
    $categories->update($request->all());
    return to_route('categories.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  category_id $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $category = Category::find($id);

    $category->delete();

    return to_route('categories.index');
  }
}
