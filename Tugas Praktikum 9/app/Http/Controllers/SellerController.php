<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    // Create
    public function insertSellerUseEloquent(Request $r){
      $r->validate([
        'name' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'no_hp' => 'required',
        'status' => 'required'
      ], [
        'name.required' => 'Kolom nama harus diisi!',
        'address.required' => 'Kolom address harus diisi!',
        'gender.required' => 'Kolom jenis kelamin harus diisi!',
        'no_hp.required' => 'Kolom no. hp harus diisi!',
        'status.required' => 'Kolom status harus diisi!'
      ]);
      $seller = new Seller;
      $seller->name = $r->name;
      $seller->address = $r->address;
      $seller->gender = $r->gender;
      $seller->no_hp = $r->no_hp;
      $seller->status = $r->status;
      $seller->save();
		  return redirect('/seller')->with('success','Data berhasil di-input!');
    }
    public function insertSellerUseQueryBuilder(Request $r){
      $r->validate([
        'name' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'no_hp' => 'required',
        'status' => 'required'
      ], [
        'name.required' => 'Kolom nama harus diisi!',
        'address.required' => 'Kolom address harus diisi!',
        'gender.required' => 'Kolom jenis kelamin harus diisi!',
        'no_hp.required' => 'Kolom no. hp harus diisi!',
        'status.required' => 'Kolom status harus diisi!'
      ]);
		  DB::table('sellers')->insert([
        'name' => $r->name,
        'address' => $r->address,
        'gender' => $r->gender,
        'no_hp' => $r->no_hp,
        'status' => $r->status,
      ]);
		  return redirect('/seller')->with('success','Data berhasil di-input!');
    }

    // Read
    public function showSellerUseEloquent(){
      $seller = Seller::paginate(25)->onEachSide(2);
      return view('seller', compact(['seller']));
    }
    public function showSellerUseQueryBuilder(){
    	$seller = DB::table('sellers')->paginate(25);
    	return view('seller',['seller' => $seller]);
    }

    // Update
    public function saveSellerUseEloquent(Request $r){
      $seller = Seller::find($r->id);
      $seller->name = $r->name;
      $seller->address = $r->address;
      $seller->gender = $r->gender;
      $seller->no_hp = $r->no_hp;
      $seller->status = $r->status;
      $seller->save();
		  return redirect('/seller')->with('success','Data berhasil diedit!');
    }
    public function saveSellerUseQueryBuilder(Request $r){
		  DB::table('sellers')->where('id',$r->id)->update([
        'name' => $r->name,
        'address' => $r->address,
        'gender' => $r->gender,
        'no_hp' => $r->no_hp,
        'status' => $r->status,
      ]);
		  return redirect('/seller')->with('success','Data berhasil diedit!');
    }

    // Delete
    public function deleteSellerUseEloquent(Request $r){
      $seller = Seller::find($r->id);
      $seller->delete();
		  return redirect('/seller')->with('success','Data berhasil dihapus!');
    }
    public function deleteSellerUseQueryBuilder(Request $r){
      DB::table('sellers')->where('id',$r->id)->delete();
      return redirect('/seller')->with('success','Data berhasil dihapus!');
    }
}
