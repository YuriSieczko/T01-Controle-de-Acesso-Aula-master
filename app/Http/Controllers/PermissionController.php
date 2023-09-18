<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $role = $request->papel;
        $role = Role::findByName($role);
        $permissions = $request->permissoes;

        $role->syncPermissions($permissions);
        
        return redirect()->route('roles.index');
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit(Permission $permission)
    {
        //
    }

    public function update(Request $request, Permission $permission)
    {
        //
    }

    public function destroy(Permission $permission)
    {
        //
    }
}
