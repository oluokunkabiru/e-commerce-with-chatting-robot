<?php

namespace App\Http\Controllers;

// use App\Product;

use App\Models\Category;
use App\Models\City;
use App\Models\Consultants;
use App\Models\Lga;
use App\Models\Product;
use App\Models\Services;
use App\Models\Setting;
use App\Models\State;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    //
     //


     public function index(){
        $category = Product::orderBy('id','DESC')->first()->paginate(10)->unique('category_id');
        $products = Product::inRandomOrder()->where('status', 'active')->paginate(20);
        $latest = Product::orderBy('id','DESC')->where('status', 'active')->paginate(16);
        $latestrated = Product::inRandomOrder()->where('status', 'active')->paginate(18);
         $latestreview = Product::inRandomOrder()->where('status', 'active')->paginate(18);
         $services = Services::orderBy('id', 'desc')->get();
        return view('pages.index', compact(['category','services','products','latest','latestrated', 'latestreview']));
     }

     public function marketerpayment(){
         return view('pages.marketer-fee-payment');
     }

     public function shop(){
        //  return State::get();
         $products =  Product::inRandomOrder()->where('status', 'active')->paginate(20);
         $category = Product::orderBy('id','desc')->first()->paginate(10)->unique('category_id');
         $latest = Product::orderBy('id','desc')->where('status', 'active')->paginate(18);
         $latestrated = Product::orderBy('id','desc')->where('status', 'active')->paginate(18);
         $latestreview = Product::orderBy('id','desc')->where('status', 'active')->paginate(18);
         $categor = Category::orderBy('id', 'desc')->paginate(10);
         $minprice = Product::min('newprice');
         $maxprice  = Product::max('newprice');


         return view('pages.shopgrid', compact(['category','minprice','maxprice', 'categor','products','latest','latestrated', 'latestreview']));
     }



     public function states(Request $request){
         $id = $request->country;
         $states = State::where('country_id', $id)->orderby('name', 'asc')->get();
        return view('pages.state-list',compact(['states']));
         //  return $state;
     }


     public function consultant(){
        $setting = Setting::where('id', 1)->firstOrFail();

         return view('pages.consultant', compact(['setting']));
     }

     public function consultantus(Request $request){
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'practice' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'mode' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);
        // return $request;
        $consult =  new Consultants();
        $consult->name = $request->name;
        $consult->email = $request->email;
        $consult->phone = $request->phone;
        $consult->practice = $request->practice;
        $consult->mode = $request->mode;
        $consult->address = $request->address;
        $consult->other = $request->other;
        $consult->country_id = $request->country;
        $consult->state_id = $request->state;
        $consult->city_id = $request->country ==161 ? '': $request->city;
        $consult->lga_id = $request->country !=161 ?  $request->city : '';
        $consult->save();
        return redirect()->route('consult-thanks', $consult->name);


     }

     public function consultantThanks($name){
         return view('pages.consult-thanks', compact('name'));
     }
     public function cities(Request $request){
        $id = $request->state;
        $state = State::where('id', $id)->first();
        // return $state;
        if($state->country_id==161){
            $city = Lga::where('state_id', $id)->orderBy('name', 'asc')->get();
        }else{

        $city = City::where('state_id', $id)->orderBy('name', 'asc')->get();
        }
        // return $city;
        return view('pages.city-list', compact(['city']));
    }


     public function mystore($username){
        $user = User::where('username', $username)->first();

        $products =  Product::inRandomOrder()->where('user_id', $user?$user->id:"")->where('status', 'active')->paginate(20);
        $category = Product::orderBy('id','desc')->first()->paginate(10)->unique('category_id');
        $latest = Product::orderBy('id','desc')->where('status', 'active')->paginate(18);
        $latestrated = Product::orderBy('id','desc')->where('status', 'active')->paginate(18);
        $latestreview = Product::orderBy('id','desc')->where('status', 'active')->paginate(18);
        $categor = Category::orderBy('id', 'desc')->paginate(10);
        $minprice = Product::min('newprice');
        $maxprice  = Product::max('newprice');


        return view('pages.store', compact(['category','user','minprice','maxprice', 'categor','products','latest','latestrated', 'latestreview']));
    }
     public function headers(){
        $setting = Setting::with(['picture'])->where('id', 1)->firstOrFail();
         return view('includes.header', compact(['setting']));
     }
     public function heads(){
        $setting = Setting::with(['picture'])->where('id', 1)->firstOrFail();
        // return $setting;
        return view('includes.head', compact(['setting']));
     }
     public function contact(){
         $setting = Setting::where('id', 1)->firstOrFail();
         return view('pages.contact', compact(['setting']));
     }
     public function blog(){
         return view('pages.blog');
     }

     public function blogDetails(){
         return view('pages.bloddetails');
     }

     public function productDetails($product){
         $products = Product::with(['picture', 'category'])->where('status', 'active')->firstOrfail()->where('slug', $product)->get();
         $rel = '';
         foreach($products as $id ){
             $rel = $id->category_id;
         }
         $related = Product::with(['picture', 'category'])->orderBy('id','desc')->where('status', 'active')->where('category_id', $rel)->paginate(10);
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

     public function footer(){
         $setting = Setting::with(['picture'])->where('id', 1)->firstOrFail();
         return view('includes.footer', compact(['setting']));
     }


}
