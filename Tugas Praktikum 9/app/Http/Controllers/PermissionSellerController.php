<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Models\PermissionSeller;
use Illuminate\Support\Facades\DB;

class PermissionSellerController extends Controller
{
    // Create
    public function insertPermissionSellerUseEloquent(Request $r){
      $r->validate([
        'seller' => 'required',
        'permission' => 'required'
      ], [
        'seller.required' => 'Kolom seller harus diisi!',
        'permission.required' => 'Kolom permission harus diisi!'
      ]);
        $permissionseller = new PermissionSeller;
        $permissionseller->permission_id = $r->permission;
        $permissionseller->seller_id = $r->seller;
        $permissionseller->save();
		  return redirect('/permissionseller')->with('success','Data berhasil di-input!');
    }
    public function insertPermissionSellerUseQueryBuilder(Request $r){
      $r->validate([
        'seller' => 'required',
        'permission' => 'required'
      ], [
        'seller.required' => 'Kolom seller harus diisi!',
        'permission.required' => 'Kolom permission harus diisi!'
      ]);
      DB::table('permissionseller')->insert([
        'permission_id' => $r->permission,
        'seller_id' => $r->seller,
      ]);
      return redirect('/permissionseller')->with('success','Data berhasil di-input!');
    }

    // Read
    public function showPermissionSellerUseEloquent(){
      $seller = Seller::all();
      $permission = Permission::all();
      $permissionseller = PermissionSeller::paginate(25)->onEachSide(2);
      return view('permissionseller', compact(['seller','permission','permissionseller']));
    }
    public function showPermissionSellerUseQueryBuilder(){
    	$permissionseller = DB::table('permissionseller')->get();
    	return view('permissionseller',['permissionseller' => $permissionseller]);
    }

    // Update
    public function savePermissionSellerUseEloquent(Request $r){
      $permissionseller = PermissionSeller::find($r->id);
      $permissionseller->permission_id = $r->permission;
      $permissionseller->seller_id = $r->seller;
      $permissionseller->save();
		  return redirect('/permissionseller')->with('success','Data berhasil diedit!');
    }
    public function savePermissionSellerUseQueryBuilder(Request $r){
      DB::table('permissionseller')->where('id',$r->id)->update([
        'permission_id' => $r->permission,
        'seller_id' => $r->seller
      ]);
      return redirect('/permissionseller')->with('success','Data berhasil diedit!');
    }

    // Delete
    public function deletePermissionSellerUseEloquent(Request $r)
    {
      $permissionseller = PermissionSeller::find($r->id);
      $permissionseller->delete();
		  return redirect('/permissionseller')->with('success','Data berhasil dihapus!');
    }
      public function deletePermissionSellerUseQueryBuilder(Request $r)
    {
      DB::table('permissionseller')->where('id',$r->id)->delete();
      return redirect('/permissionseller')->with('success','Data berhasil dihapus!');
    }

}
