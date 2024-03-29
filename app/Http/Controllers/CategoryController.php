<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\ValidationRules;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (Auth::check()) {
      $user = User::find(Auth::id());

      if ($user->hasRole('admin')) {
        return view('admin.categories.index');
      }
    }
    return view('customer.categories.index');
  }
  /**
   * Display the specified resource.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $category = Category::findOrFail($id);
    return view('admin.categories.show', [
      "category" => $category,
    ]);
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
    $categories = Category::where('name', 'like', "%$query%")->get();

    return view('admin.categories.index', ['categories' => $categories]);
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
    $request->validate(ValidationRules::categoryRules());

    $category = Category::create([
      'name' => $request->name,
      'category_id' => $request->category_id,
    ]);

    return redirect()->route('categories.index')->with('success', 'La categoria se ha agregado con exito');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
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

  public function destroy($id)
  {
    $category = Category::find($id);
    if (!$category->trashed()) {
      Category::find($id)->delete();
      $status = 'Categoria eliminado exitosamente';
    } else {
      $status = 'No se puede borrar la categoria ya eliminado o inexistente';
    }
    return to_route('categories.index')->with('status', $status);
  }

  public function restore($id)
  {
    $category = Category::withTrashed()->find($id);
    if ($category->trashed()) {
      $category->restore();
      $status = 'Categoria restaurado exitosamente';
    } else {
      $status = 'No se puede restaurar la categoria activo o inexistente';
    }

    return to_route('categories.index')->with('status', $status);
  }
}
