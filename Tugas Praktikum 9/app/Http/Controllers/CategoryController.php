<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // Create
    public function insertCategoryUseEloquent(Request $r){
      $r->validate([
        'name' => 'required',
        'status' => 'required'
      ], [
        'name.required' => 'Kolom nama harus diisi!',
        'status.required' => 'Kolom status harus diisi!'
      ]);
        $category = new Category;
        $category->name = $r->name;
        $category->status = $r->status;
        $category->save();
		  return redirect('/category')->with('success','Data berhasil di-input!');
    }
    public function insertCategoryUseQueryBuilder(Request $r){
      $r->validate([
        'name' => 'required',
        'status' => 'required'
      ], [
        'name.required' => 'Kolom nama harus diisi!',
        'status.required' => 'Kolom status harus diisi!'
      ]);
      DB::table('categories')->insert([
        'name' => $r->name,
        'status' => $r->status,
      ]);
      return redirect('/category')->with('success','Data berhasil di-input!');
    }

    // Read
    public function showCategoryUseEloquent(){
        $category = Category::paginate(25)->onEachSide(2);
        return view('category', compact(['category']));
    }
    public function showCategoryUseQueryBuilder(){
    	$category = DB::table('categories')->paginate(25);
    	return view('category',['category' => $category]);
    }

    // Update
    public function saveCategoryUseEloquent(Request $r){
      $category = Category::find($r->id);
      $category->name = $r->name;
      $category->status = $r->status;
      $category->save();
		  return redirect('/category')->with('success','Data berhasil diedit!');
    }
    public function saveCategoryUseQueryBuilder(Request $r){
      DB::table('categories')->where('id',$r->id)->update([
        'name' => $r->name,
        'status' => $r->status
      ]);
      return redirect('/category')->with('success','Data berhasil diedit!');
    }

    // Delete
    public function deleteCategoryUseEloquent(Request $r){
        $category = Category::find($r->id);
        $category->delete();
		return redirect('/category')->with('success','Data berhasil dihapus!');
    }
    public function deleteCategoryUseQueryBuilder(Request $r){
		DB::table('categories')->where('id',$r->id)->delete();
		return redirect('/category')->with('success','Data berhasil dihapus!');
    }

}
