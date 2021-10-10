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

public function allOrders()
{
    $products = Product::with(['picture', 'orders', 'user'])->orderBy('id', 'DESC')->get();
    return view('admin.all_orders', compact(['products']));
}

public function viewAllOrderStatus(Request $request)
{
    $id = $request->view;
    $view = Order::with(['picture', 'product','user'])->where('id', $id)->firstOrfail();
    $marketer = Product::with(['user', 'picture'])->where('id', $view->product->id)->firstOrFail();
    return view('admin.admin_view_all_order', compact(['view', 'marketer']));
}

// buyeers

public function adminBuyers()
{
    // $customers = Product::with(['picture', 'orders', 'user'])->orderBy('id', 'DESC')->where(['user_id'=>Auth::user()->id])->pluck('id');

    $product = Product::where(['user_id'=>Auth::user()->id])->pluck('id')->unique();
    //
    $orders = Order::whereIn('product_id', $product)->pluck('user_id')->unique();
    // return $order;
    $order = Order::whereIn('product_id', $product)->get();
    $customers = User::with(['picture'])->orderBy('id', 'DESC')->whereIn('id', $orders)->get();

    // return $customers;
    return view('admin.admin_customers', compact(['customers','order']));
}

public function allBuyers()
{
    $customer = Order::pluck('user_id')->unique();
    $order = Order::whereIn('user_id', $customer)->distinct()->get();
    $customers = User::with(['picture'])->orderBy('id', 'DESC')->whereIn('id', $customer)->get();
    // return $order;
    return view('admin.all_customers', compact(['customers', 'order']));
}


public function buyersInformation(Request $request){
    $id = $request->view;
    $customer = User::where('id',$id )->firstOrFail();
    $mproduct = Product::with(['user', 'orders'])->where('user_id', Auth::user()->id)->get();
    $totalmyproductorder =0;
    // my product order
    foreach ($mproduct as $mp) {
        $or = Order::where(['product_id'=> $mp->id, 'user_id'=>$id])->get();
        foreach ($or as $order) {
            $totalmyproductorder+=$order->quantity;
        }
    }
// my product deliver for this customer
$totaldeliveredforthiscustomer=0;
    // my product order
    foreach ($mproduct as $mp) {
        $or = Order::where(['product_id'=> $mp->id, 'user_id'=>$id, 'status'=>'Delivered'])->get();
        foreach ($or as $order) {
            $totaldeliveredforthiscustomer+=$order->quantity;
        }
    }

    // total product order
    $totalproductorder=0;
        $or = Order::where(['user_id'=>$id])->get();
        foreach ($or as $order) {
            $totalproductorder+=$order->quantity;
    }
    // total qunatity delivered

    // total product order
    $totalproductdelivered=0;
        $or = Order::where(['user_id'=>$id, 'status'=>'Delivered'])->get();
        foreach ($or as $order) {
            $totalproductdelivered+=$order->quantity;
    }
$customers = Order::where('user_id', $id)->OrderBy('id', 'DESC')->firstOrFail();


    return view('admin.customers_information', compact(['customer', 'totalmyproductorder', 'totalproductorder',
    'totaldeliveredforthiscustomer', 'totalproductdelivered','customers']));
}

public function marketerRequest(){
    $marketers = User::with(['picture'])->where(['role'=>'marketer', 'status'=>'free'])->get();
    return view('admin.marketer_request', compact(['marketers']));
}
public function acceptMarketer(Request $request ){
    $id = $request->id;
    $marketer = User::where('id', $id)->firstOrFail();
    $marketer->status = "paid";
    $marketer->update();
    return redirect()->back()->with('success', $marketer->name." Approved  Successfully");
}

}
