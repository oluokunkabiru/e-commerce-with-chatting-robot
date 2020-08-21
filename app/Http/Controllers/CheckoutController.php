<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderdProdct;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.checkout');
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
    
    public function store(OrderRequest $request)
    {
        //
        if( Cart::instance('default')->count < 0)
        {
            return redirect()->route('home')->with('fail', 'Shop before you submit orders');
        }
         foreach(Cart::content() as $item)
         {
            $orders = new Order;
                $orders->user_id   =  Auth::user()->id;
                $orders->product_id    = $item->model->id;
                $orders->product_name  = $item->model->product_name;
                $orders->picture_id   =$item->model->picture_id;
                $orders->quantity      =$item->qty;
                $orders->billing_email = $request->email;
                $orders->billing_country       = $request->country;
                $orders->billing_state     = $request->state;
                $orders->billing_city      =    $request->city;
                $orders->billing_address   = $request->address.', '. $request->address1;
                $orders->billing_zipcode   =    $request->zipcode;
                $orders->billing_phone     =    $request->phone;
                $orders->billing_price     =    $item->model->newprice;
                $orders->billing_total_price     =    $item->model->newprice*$item->qty;
                $orders->billing_payment_method=$request->payment_method;
            $orders->save();
         }
         foreach(Cart::content() as $item)
         {
            $ordersproduct =new OrderdProdct;
                $ordersproduct->order_id  = $orders->id;
                $ordersproduct->product_id = $item->model->id;
                $ordersproduct->quantity = $item->qty;
            $ordersproduct->save();
         }
    Cart::destroy();
  return redirect()->route('thanks');
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
