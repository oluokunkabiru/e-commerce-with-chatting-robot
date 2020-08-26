<?php

namespace App\Http\Controllers\Marketer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
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
        $products = Product::where('user_id', Auth::user()->id)->get();
        $totalproductposted = count($products);
        $order = Order::with(['picture','product', 'user'])->join('products', 'products.id', 'orders.product_id')
                 ->join('users', 'products.user_id', 'users.id')->where('users.id', Auth::user()->id)->get();
        $totalordered =count($order);
        $deliver = Order::with(['picture','product', 'user'])->join('products', 'products.id', 'orders.product_id')
                ->join('users', 'products.user_id', 'users.id')->where(['users.id'=> Auth::user()->id, 'orders.status'=>'Delivered'])->get();
        $totaldelivered = count($deliver);
        $pending = Order::with(['picture','product', 'user'])->join('products', 'products.id', 'orders.product_id')
                     ->join('users', 'products.user_id', 'users.id')->where(['users.id'=> Auth::user()->id, 'orders.status'=>'Pending'])->get();
        $totalpending = count($pending);

        return view('marketer.dashboard', compact(['totalproductposted','totalordered', 'totaldelivered', 'totalpending']));
    }


public function test(){
    $order = Order::with(['picture','product', 'user'])->join('products', 'products.id', 'orders.product_id')
    ->join('users', 'products.user_id', 'users.id')->where(['users.id'=>1, 'orders.status'=>'Delivered'])->get();
    // $order = Order::select('orders.*')->get();
    return $order;
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
