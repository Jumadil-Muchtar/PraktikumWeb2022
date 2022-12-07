<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->paginate(20);
        return view('permissions', compact('permissions'))->with('i',(request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('permissions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);

        Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success','Permission added');
    }
    public function edit(Permission $permission)
    {
        return view('permissions.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([

        ]);

        $permission->update($request->all());
        return redirect()->route('permissions.index')->with('success','Permission updated');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success','Permission deleted');
    }
}
