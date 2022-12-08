<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('categories', compact('categories'))->with('i',(request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success','Category added');
    }
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([

        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','Category updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted');
    }
}
