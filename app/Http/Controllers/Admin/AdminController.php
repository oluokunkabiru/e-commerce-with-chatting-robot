<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('admin');
    //     echo $this->middleware('admin');
    // }
    public function index(){
        $totalproduct = Product::count('id');
        $totalorders = Order::count('id');
        $totalusers = User::count('id');
        $totaldelivered = Order::where('status', 'Delivered')->count('id');
        $user = User::with(['picture'])->where('id', Auth::user()->id)->firstOrFail();
        return view('admin.dashboard', compact(['totalproduct', 'totalusers', 'totalorders',
        'totaldelivered', 'user']));
    }
    public function adminorders()
    {
        $products = Product::with(['picture', 'orders', 'user'])->orderBy('id', 'DESC')->where(['user_id'=>Auth::user()->id])->get();
        return view('admin.my_order', compact(['products']));
    }
    public function adminViewOrder(Request $request)
    {
        $id = $request->input('view');
        $view = Order::with(['picture', 'product','user'])->where('id', $id)->firstOrfail();
        return view('admin.admin_view_orders', compact(['view']));
    }

    public function deliver(Request $request){
        $id = $request->deliver;
        $view = Order::with(['picture', 'product','user'])->where('id', $id)->firstOrfail();
        $deliverby = Auth::user()->name;
        return view('admin.admin_process_orders', compact(['view']));
    }

// delivered the product

public function delivered(Request $request){
    $id = $request->id;
    $deliver = Order::with(['picture', 'product','user'])->where('id', $id)->firstOrfail();
    $deliver->status = "Delivered";
    $deliver->delivered_by = Auth::user()->name;
    $deliver->update();
    return redirect()->back()->with('success', $deliver->product_name." Delivered Successfully");
}

}
