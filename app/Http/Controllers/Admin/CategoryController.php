<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
use App\Product;
use App\Category;
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


    }

    public function showCategory($category){
        return \view('pages.productdetails', compact(['category']));
    }
    public function show(Request $request){
        $id = $request->input('edit');
        $edit = Category::where('id', $id)->firstOrFail();
        return view('admin.editcategory', compact(['edit', 'id']));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category' =>'required|string|unique:categories',
        ]);

        $category = Category::where('id', $id)->firstOrFail();
        $category->category =ucwords($request->input('category'));
        $category->update();
        return redirect()->back()->with('success', "Category updated successfully");
    }

    public function delete(Request $request){
        $id = $request->input('delete');
        $delete = Category::where('id', $id)->firstOrFail();
        return view('admin.deletecategory',compact(['delete', 'id']) );
    }
    public function destroy(Request $request, $id){
        $category = Category::where('id', $id)->firstOrFail();
        $products = Product::where('category_id', $id)->get();
        foreach($products as $product)
        {
                if($product->picture_id){
                    $file_delete=Picture::findOrfail($product->picture->id);
                    $file_delete->forceDelete();
                  unlink(public_path()."/". $file_delete->file);
            }
            $delete=intval($product->id);
            Product::findOrfail($delete)->forceDelete();
        }

        $category->forceDelete();
        return  redirect()->back()->with('success','Category deleted successfully');


    }



    
    public function store(Request $request)
    {
        $request->validate([
            'category' =>'required|string|unique:categories',
        ]);

        $category = new Category();
        $category->category =ucwords($request->input('category'));
        $category->save();
        return redirect()->back()->with('success', "New category add successfully");
    }
}
