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
    public function index(Request $request)
    {
        /* $status = $request->get("status");
        switch ($status) {
            case "archived": // Get only soft-deleted users
                $users = User::onlyTrashed()->get()->except(['password', 'remember_token']);
                break;
            case "all": // Get only soft-deleted users
                $users = User::onlyTrashed()->get()->except(['password', 'remember_token']);
                break;
            default: // Get only active users
                $users = User::all()->except(['password', 'remember_token']);
                $status = "active";
                break;
        } */

        /* $term = $request->query('term');
        $users = User::when($term, function($query, $term){
            $query->where('name', 'LIKE', "%{$term}%")->orWhere('surname', 'LIKE', "%{$term}%")->orWhere('email', 'LIKE', "%{$term}%");
        })->get(); */

        //$search = $request->get('search');

        return view('admin.users.index');
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
        $user->surname = $request->input('surname');
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
    public function show(Request $request)
    {
        $id = $request->get('id');
        $user = User::findOrFail($id);
        return view('admin.users.show', [
            "user" => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->get('id');
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
        $users = User::find($id);
        $users->delete();

        return to_route('users.index');
    }
}
