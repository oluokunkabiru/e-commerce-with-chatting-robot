<?php

namespace App\Http\Controllers\Marketer;

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
        $products = Product::with(['picture', 'orders', 'user'])->where(['user_id'=>Auth::user()->id])->get();

        return view('marketer.dashboard', compact(['totalproductposted','totalordered', 'totaldelivered', 'totalpending',
        'pending', 'products']));
    }
// view product
public function marketerViewOrder(Request $request)
    {
        $id = $request->input('view');
        $view = Order::with(['picture', 'product','user'])->where('id', $id)->firstOrfail();
        return view('marketer.view_order', compact(['view']));
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
