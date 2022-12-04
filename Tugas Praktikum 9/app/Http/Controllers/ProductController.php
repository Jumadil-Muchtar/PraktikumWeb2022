<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Create
    public function insertProductUseEloquent(Request $r){
      $r->validate([
        'name' => 'required',
        'seller_id' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'status' => 'required'
      ], [
        'name.required' => 'Kolom nama harus diisi!',
        'seller_id.required' => 'Kolom id seller harus diisi!',
        'category_id.required' => 'Kolom id category harus diisi!',
        'price.required' => 'Kolom price harus diisi!',
        'status.required' => 'Kolom status harus diisi!'
      ]);
      $product = new Product;
      $product->name = $r->name;
      $product->seller_id = $r->seller_id;
      $product->category_id = $r->category_id;
      $product->price = $r->price;
      $product->status = $r->status;
      $product->save();
		  return redirect('/product')->with('success','Data berhasil di-input!');
    }
    public function insertProductUseQueryBuilder(Request $r){
      $r->validate([
        'name' => 'required',
        'seller_id' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'status' => 'required'
      ], [
        'name.required' => 'Kolom nama harus diisi!',
        'seller_id.required' => 'Kolom id seller harus diisi!',
        'category_id.required' => 'Kolom id category harus diisi!',
        'price.required' => 'Kolom price harus diisi!',
        'status.required' => 'Kolom status harus diisi!'
      ]);
		  DB::table('products')->insert([
        'name' => $r->name,
        'seller_id' => $r->seller_id,
        'category_id' => $r->category_id,
        'price' => $r->price,
        'status' => $r->status,
		  ]);
		  return redirect('/product')->with('success','Data berhasil di-input!');
    }

    // Read
    public function showProductUseEloquent(){
        $product = Product::paginate(25)->onEachSide(2);
        return view('product', compact(['product']));
    }
    public function showProductUseQueryBuilder(){
    	$product = DB::table('products')->paginate(25);
    	return view('product',['product' => $product]);
    }

    // Update
    public function saveProductUseEloquent(Request $r){
        $product = Product::find($r->id);
        $product->name = $r->name;
        $product->seller_id = $r->seller_id;
        $product->category_id = $r->category_id;
        $product->price = $r->price;
        $product->status = $r->status;
        $product->save();
		return redirect('/product')->with('success','Data berhasil diedit!');
    }
    public function saveProductUseQueryBuilder(Request $r){
		DB::table('products')->where('id',$r->id)->update([
			'name' => $r->name,
			'seller_id' => $r->seller_id,
			'category_id' => $r->category_id,
			'price' => $r->price,
			'status' => $r->status,
		]);
		return redirect('/product')->with('success','Data berhasil diedit!');
    }

    // Delete
    public function deleteProductUseEloquent(Request $r){
        $product = Product::find($r->id);
        $product->delete();
		return redirect('/product')->with('success','Data berhasil dihapus!');
    }
    public function deleteProductUseQueryBuilder(Request $r){
		DB::table('products')->where('id',$r->id)->delete();
		return redirect('/product')->with('success','Data berhasil dihapus!');
    }
}
