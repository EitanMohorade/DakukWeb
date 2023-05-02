<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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
                return view('admin.users.index');
            }
        }
        return view('customer.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $request->validate([
            'name' => 'required|min:3|max:20'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return to_route('users.index')->with('success', 'new user created successfully');
    }

    /**
     * Display de specified resource
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user]);
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
        $user = User::findOrFail($id);
        $user->update($request->all());
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->id == auth()->id()){
            $alert = 'error';
            $message = 'No puedes eliminar tu propio usuario.';
        }
        else if(!$user->trashed()){
            $alert = 'success';
            User::find($id)->delete();
            $message = 'Usuario eliminado exitosamente';
        }
        else{
            $alert = 'error';
            $message = 'No se puede borrar un usuario ya eliminado o inexistente';
        }
        return to_route('users.index')->with(['alert' => $alert, 'message' => $message]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        if($user->trashed()){
            $user->restore();
            $status = 'Usuario restaurado exitosamente';
        }
        else{
            $status = 'No se puede restaurar un usuario activo o inexistente';
        }

        return to_route('users.index')->with('status', $status);
    }
}
