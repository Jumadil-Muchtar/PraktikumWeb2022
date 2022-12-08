<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{
    public function index()
    {
        // $seller = Seller::find('name');
        // $seller -> name = 'tes';
        $sellers = Seller::latest()->paginate(20);
        return view('sellers', compact('sellers'))->with('i',(request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('sellers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'no_hp'=>'required',
            'status'=>'required'
        ]);

        Seller::create($request->all());
        return redirect()->route('sellers.index')->with('success','Seller added');
    }
    public function edit(Seller $seller)
    {
        return view('sellers.edit',compact('seller'));
    }

    public function update(Request $request, Seller $seller)
    {
        $request->validate([

        ]);

        $seller->update($request->all());
        return redirect()->route('sellers.index')->with('success','Seller updated');
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('sellers.index')->with('success','Seller deleted');
    }
}
