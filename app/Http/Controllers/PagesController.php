<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Category;
use\App\Product;

class PagesController extends Controller
{
    //
     //
     public function index(){
        $category = Product::orderBy('id','desc')->first()->limit(10)->get()->unique('category_id');
        $products = Product::orderBy('id','desc')->limit(16)->get();
        $latest = Product::orderBy('id','desc')->limit(18)->get();
        return view('pages.index', compact(['category','products','latest']));
     }

     public function shop(){
         $products =  Product::orderBy('id','desc')->paginate(20);
         $category = Product::orderBy('id','desc')->first()->limit(10)->get()->unique('category_id');
         $latest = Product::orderBy('id','desc')->limit(18)->get();

         return view('pages.shopgrid', compact(['category','products','latest']));
     }
     public function contact(){
         return view('pages.contact');
     }
     public function blog(){
         return view('pages.blog');
     }

     public function blogDetails(){
         return view('pages.bloddetails');
     }

     public function productDetails($product){
         $products = Product::with(['picture', 'category'])->firstOrfail()->where('slug', $product)->get();
         $rel = '';
         foreach($products as $id ){
             $rel = $id->category_id;
         }
         $related = Product::with(['picture', 'category'])->limit(10)->orderBy('id','desc')->where('category_id', $rel)->get();
         return view('pages.shop-details', compact(['products','related']));
     }

     public function shopCart(){
         return view('pages.shop-cart');
     }

     public function checkout(){
         return view('pages.checkout');
     }






}
