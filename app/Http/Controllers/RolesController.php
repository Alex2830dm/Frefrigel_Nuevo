<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller {
    
    public function index(){
        $roles = Role::all();
        return view('roles.indexRoles')->with(['roles' => $roles]);
    }

    public function create(){
        $permissions = Permission::all();
        //dd($permissions);
        return view('roles.createRole')->with(['permissions' => $permissions]);
    }

    public function store(Request $request){
        //dd($request);
        $role = Role::create(['name' => $request->get('nameRol')]);
        $role->permissions()->sync($request->input('permissions', []));
        //$role->syncPermissions($request->input('permissions', []));
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        //abort_if(Gate::denies('role_edit'), 403);
        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        // dd($role);
        return view('roles.editRoles', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role) {
        //dd($request->get('permissions', []));
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permissions', []));
        //$role->syncPermissions($request->input('permissions', []));
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role){
        //abort_if(Gate::denies('role_delete'), 403);
        $role->delete();
        return redirect()->route('roles.index');
    }
}
