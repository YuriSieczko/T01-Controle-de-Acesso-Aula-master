<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = User::find($request->user);
        $roles = $request->roles;

        $user->syncRoles($roles);
        
        return redirect()->route('roles.index');
    }

    public function show(User $user)
    {
        $roles = Role::all();

        return view('users.show', compact(['roles', 'user']));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
