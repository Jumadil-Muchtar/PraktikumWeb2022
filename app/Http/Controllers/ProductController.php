<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('products', compact('products'))->with('i',(request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('products.create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'seller_id'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'status'=>'required'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success','Product added');
    }
    public function edit(Product $product)
    {
        $categories = Category::get();
        $sellers = Seller::get();
        return view('products.edit', compact('product'), compact('categories'), compact('sellers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([

        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success','Product updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted');
    }
}
