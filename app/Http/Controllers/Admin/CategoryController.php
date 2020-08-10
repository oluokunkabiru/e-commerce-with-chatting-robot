<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::get();
        return view('admin.category', compact('categories'));
    }

    public function create(Request $request){
        $request->validate([
            'category' =>'required|string|unique:categories',
        ]);

        $category = new Category();
        $category->category =ucwords($request->input('category'));
        $category->save();
        return redirect()->back()->with('success', "New category add successfully");

    }

    public function showCategory($category){
        return \view('pages.productdetails', compact(['category']));
    }

}
