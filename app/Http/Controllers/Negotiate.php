<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Product;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Hamcrest\Type\IsNumeric;

class Negotiate extends Conversation
{


    protected $productid;

    protected $customer;

    public function __construct($product, $customer)
    {
        // parent::__construct();
        $this->customer = $customer;
        $this->productid = $product;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function run()
    {
        //
        // This will be called immediately
        // $productid = $this->productid;
        // $customer = $this->customer;$productid, $customer
        $this->askPrice($this->productid, "Kabiru");

    }

    public function askPrice($id, $customer){
        $product = Product::where('id', $id)->first();
        $least = $product->oldprice;
        $price = $product->newprice;

        $this->ask('How much do you want pay for <b>' . ucwords($product->product_name)."</b>", function(Answer $answer)use($price, $least){
            $accept = false;

            // while(! $accept){

            $price = $answer->getText();
            $unaccept = array('This price is not accepte', 'This product is worth more than this price', 'Added more to this price',
             'You can get it the product by adding more price', 'Please there is this money now, let spend it. So add more price');
            // $i++;
            shuffle($unaccept);
            $que = $unaccept[0];
            if(is_numeric($price)){
                if($least > $price ){
                    $this->repeat($que .'<span class=="fa">&#8358;</span>'. $least);
                }else{
                    $this->say('You can proceed to pay  .'. $price);
                }
            }else{
                $this->repeat("Please enter your wish amount in number format like 200");
            }


        });
    // }while($i < 4);

    }

    public function askEmail()
    {
        $this->ask('One more thing - what is your email?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->say('Great - that is all we need, '.$this->customer);
        });
    }

    // public function run()
    // {
    //     // This will be called immediately
    //     $this->askFirstname();
    // }

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
    // public function store(Request $request)
    // {
    //     //
    // }

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
    // public function update(Request $request, $id)
    // {
    //     //
    // }

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
