<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller_permission;
use App\Models\Permission;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;

class SellerPermissionController extends Controller
{
    public function index()
    {
        $sellerPermissions = Seller_permission::latest()->paginate(20);
        return view('seller-permissions', compact('sellerPermissions'))->with('i',(request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $permissions = DB::table('permissions')->get();
        return view('seller_permissions.create', ['permissions'=>$permissions]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'seller_id'=>'required',
            'permission_id'=>'required'
        ]);

        Seller_permission::create($request->all());
        return redirect()->route('seller-permissions.index')->with('success','Seller permission added');
    }
    public function edit(Seller_permission $seller_permission)
    {
        // $sellers = Seller::all();
        $permissions = Permission::get();
        return view('seller_permissions.edit', compact('seller_permission'), compact('permissions'));
    }

    public function update(Request $request, Seller_permission $seller_permission)
    {
        $request->validate([

        ]);

        $seller_permission->update($request->all());
        return redirect()->route('seller-permissions.index')->with('success','Seller permission updated');
    }

    public function destroy(Seller_permission $seller_permission)
    {
        $seller_permission->delete();
        return redirect()->route('seller-permission.index')->with('success','Seller permission deleted');
    }
}
