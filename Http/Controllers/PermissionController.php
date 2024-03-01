<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }


    public function store(Request $request)
    {
        $permission = Permission::create($request->all());
        return redirect()->route('permissions.index');
    }


    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect()->route('permissions.index');
    }


    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index');
    }
}
