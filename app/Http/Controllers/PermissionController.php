<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    
    public function index() {
        $permissions = Permission::all();
        return view('permissions.index')->with(['permissions' => $permissions]);
    }

    public function create() {
        //
    }

    
    public function store(Request $request) {
        //
    }

    public function show(string $id) {
        //
    }


    public function edit(string $id) {
        //
    }


    public function update(Request $request, string $id) {
        //
    }


    public function destroy(string $id) {
        //
    }
}
