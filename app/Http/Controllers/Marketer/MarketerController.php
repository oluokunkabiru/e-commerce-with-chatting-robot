<?php

namespace App\Http\Controllers\Marketer;

use App\User;
use App\Order;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MarketerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::where('user_id', Auth::user()->id)->get();
        $totalproductposted = count($product);
        $order = Order::with(['picture','product', 'user'])->join('products', 'products.id', 'orders.product_id')
                 ->join('users', 'products.user_id', 'users.id')->where('users.id', Auth::user()->id)->get();
        $totalordered =count($order);
        $deliver = Order::with(['picture','product', 'user'])->join('products', 'products.id', 'orders.product_id')
                ->join('users', 'products.user_id', 'users.id')->where(['users.id'=> Auth::user()->id, 'orders.status'=>'Delivered'])->get();
        $totaldelivered = count($deliver);
        $pending = Order::with(['picture','product', 'user'])->join('products', 'products.id', 'orders.product_id')
                     ->join('users', 'products.user_id', 'users.id')->where(['users.id'=> Auth::user()->id, 'orders.status'=>'Pending'])->get();
        $totalpending = count($pending);

        $user = User::with(['picture'])->where('id', Auth::user()->id)->firstOrFail();
        return view('marketer.dashboard', compact(['totalproductposted','totalordered', 'totaldelivered', 'totalpending',
        'pending', 'user']));
    }
    // product orders for both recent and all orders

    public function marketerOrders(){
        $products = Product::with(['picture', 'orders', 'user'])->orderBy('id', 'DESC')->where(['user_id'=>Auth::user()->id])->get();
        return view('marketer.marketer_all_orders', compact(['products']));
    }



    // marketers buyers/customers
    public function marketersBuyers(){
        $customers = Product::with(['picture', 'orders', 'user'])->orderBy('id', 'DESC')->where(['user_id'=>Auth::user()->id])->get()->unique();
        // return $customers;
        return view('marketer.marketers_buyers', compact(['customers']));
    }
// view product

public function buyersinformation(Request $request){
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


    return view('marketer.customer_details', compact(['customer', 'totalmyproductorder', 'totalproductorder',
    'totaldeliveredforthiscustomer', 'totalproductdelivered','customers']));
}
public function marketerViewOrder(Request $request)
    {
        $id = $request->input('view');
        $view = Order::with(['picture', 'product','user'])->where('id', $id)->firstOrfail();
        return view('marketer.view_order', compact(['view']));
    }
// view deliver product
    public function deliver(Request $request){
        $id = $request->deliver;
        $view = Order::with(['picture', 'product','user'])->where('id', $id)->firstOrfail();
        $deliverby = Auth::user()->name;
        return view('marketer.process_order', compact(['view']));
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

    public function vieweditproduct(Request $request)
    {
        $id = $request->input('edit');
        $categories = Category::get();
        $edit = Product::with(['picture', 'category'])->where('id', $id)->firstOrFail();
        return view('marketer.vieweditproduct', compact(['id','categories','edit']));
        //,
    }


    public function viewdeleteproduct(Request $request){
        $id = $request->input('delete');

        $delete = Product::with(['picture', 'category'])->where('id', $id)->firstOrFail();

        return view('marketer.viewdeleteproduct',  compact(['delete','id']));

    }


public function test(){
    // $order = Order::with(['picture','product', 'user'])->rightjoin('products', 'products.id', 'orders.product_id')
    // ->rightjoin('users', 'products.user_id', 'users.id')->where(['users.id'=>Auth::user()->id, 'orders.status'=>'Pending'])->get();
    // $order = Order::select('orders.*')->get();

    $products = Product::with(['picture', 'orders', 'user'])->where(['user_id'=>1])->get();
   return view('marketer.test', compact(['products']));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
