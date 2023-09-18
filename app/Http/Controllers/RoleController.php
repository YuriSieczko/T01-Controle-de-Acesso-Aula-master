<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->nome;

        $role->save();

        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        $permissions = Permission::all();

        return view('roles.show', compact(['permissions', 'role']));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $reg = Role::find($id);

        $reg->fill([
            'name' => $request->nome
        ]);

        $reg->save();

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role = Role::find($role->id);
        
        if(!isset($role)){
            $msg = "Não há [ Role ], com identificador [ $role ], registrado no sistema!";
            $link = "roles.index";
            return view('roles.erroid', compact(['msg', 'link']));
        }
        
        Role::destroy($role->id);
        
        return redirect()->route('roles.index');
    }
}
