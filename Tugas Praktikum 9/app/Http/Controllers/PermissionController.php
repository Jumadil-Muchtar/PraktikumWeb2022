<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    // Create
    public function insertPermissionUseEloquent(Request $r){
      $r->validate([
        'name' => 'required',
        'description' => 'required',
        'status' => 'required'
      ], [
        'name.required' => 'Kolom nama harus diisi!',
        'description.required' => 'Kolom deskripsi harus diisi!',
        'status.required' => 'Kolom status harus diisi!'
      ]);
      $permission = new Permission;
      $permission->name = $r->name;
      $permission->description = $r->description;
      $permission->status = $r->status;
      $permission->save();
		  return redirect('/permission')->with('success','Data berhasil di-input!');
    }
    public function insertPermissionUseQueryBuilder(Request $r){
      $r->validate([
        'name' => 'required',
        'description' => 'required',
        'status' => 'required'
      ], [
        'name.required' => 'Kolom nama harus diisi!',
        'description.required' => 'Kolom deskripsi harus diisi!',
        'status.required' => 'Kolom status harus diisi!'
      ]);
		  DB::table('permissions')->insert([
			'name' => $r->name,
			'description' => $r->description,
			'status' => $r->status,
		]);
		return redirect('/permission')->with('success','Data berhasil di-input!');
    }

    // Read
    public function showPermissionUseEloquent(){
        $permission = Permission::paginate(25)->onEachSide(2);
        return view('permission', compact(['permission']));
    }
    public function showPermissionUseQueryBuilder(){
    	$permission = DB::table('permissions')->paginate(25);
    	return view('permission',['permission' => $permission]);
    }

    // Update
    public function savePermissionUseEloquent(Request $r){
      $permission = Permission::find($r->id);
      $permission->name = $r->name;
      $permission->description = $r->description;
      $permission->status = $r->status;
      $permission->save();
		  return redirect('/permission')->with('success','Data berhasil diedit!');
    }
    public function savePermissionUseQueryBuilder(Request $r){
		  DB::table('permissions')->where('id',$r->id)->update([
			'name' => $r->name,
			'description' => $r->description,
			'status' => $r->status,
		]);
		return redirect('/permission')->with('success','Data berhasil diedit!');
    }

    // Delete
    public function deletePermissionUseEloquent(Request $r){
      $permission = Permission::find($r->id);
      $permission->delete();
		  return redirect('/permission')->with('success','Data berhasil dihapus!');
    }
    public function deletePermissionUseQueryBuilder(Request $r){
      DB::table('permissions')->where('id',$r->id)->delete();
      return redirect('/permission')->with('success','Data berhasil dihapus!');
    }
}
