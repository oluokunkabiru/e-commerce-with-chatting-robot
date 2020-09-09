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
        $category = Product::orderBy('id','DESC')->first()->paginate(10)->unique('category_id');
        $products = Product::inRandomOrder()->paginate(20);
        $latest = Product::orderBy('id','DESC')->paginate(16);
        $latestrated = Product::inRandomOrder()->paginate(18);
         $latestreview = Product::inRandomOrder()->paginate(18);
        return view('pages.index', compact(['category','products','latest','latestrated', 'latestreview']));
     }

     public function shop(){
         $products =  Product::inRandomOrder()('id','desc')->paginate(20);
         $category = Product::orderBy('id','desc')->first()->paginate(10)->unique('category_id');
         $latest = Product::orderBy('id','desc')->paginate(18);
         $latestrated = Product::orderBy('id','desc')->paginate(18);
         $latestreview = Product::orderBy('id','desc')->paginate(18);


         return view('pages.shopgrid', compact(['category','products','latest','latestrated', 'latestreview']));
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
         $related = Product::with(['picture', 'category'])->orderBy('id','desc')->where('category_id', $rel)->paginate(10);
         return view('pages.shop-details', compact(['products','related']));
     }

     public function shopCart(){
         return view('pages.shop-cart');
     }

     public function checkout(){
         return view('pages.checkout');
     }

     public function histories(){
         return view('pages.history');
     }

     public function related(){
         $products = Product::with(['picture'])->orderBy('id', 'DESC')->paginate(20);
         return view('pages.test', compact(['products']));
     }



}
