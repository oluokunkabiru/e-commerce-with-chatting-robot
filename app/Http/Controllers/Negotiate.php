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

        $this->ask('How much do you want pay for <b>' . ucwords($product->product_name)."</b>", function(Answer $answer) use ($price, $least){

            // while(! $accept){

            $price = $answer->getText();
            $t10 = (0.1*$least);
            $t20 = (0.2*$least);
            $t30 = (0.3*$least);
            $t40 = (0.4*$least);
            $t50 = (0.5*$least);
            $t60 = (0.6*$least);
            $t70 = (0.7*$least);
            $t80 = (0.8*$least);
            $unaccept = array('This price is not accepted', 'This product is worth more than this price', 'Added more to this price',
             'You can get it the product by adding more price', 'Please there is this money now, let spend it. So add more price');
            // $i++;
            shuffle($unaccept);
            $que = $unaccept[0];


            $t10m = ['OOPs, this price is very small customer', 'This is too small', 'Ahhhh, its not accepted', 'Why this small, increase your price'];
            $t20m = ['This price is small 2', 'Dear customer 2', 'please add more price 2', 'Let continue adding price 2'];
            $t30m = ['This price is small 3', 'Dear customer 3', 'please add more price 3', 'Let continue adding price 3'];
            $t40m = ['This price is small 4', 'Dear customer 4', 'please add more price 4', 'Let continue adding price 4'];
            $t50m = ['This price is small 5', 'Dear customer 5', 'please add more price 5', 'Let continue adding price 5'];
            $t60m = ['This price is small 6', 'Dear customer 6', 'please add more price 6', 'Let continue adding price 6'];
            $t70m = ['This price is small 7', 'Dear customer 7', 'please add more price 7', 'Let continue adding price 7'];
            $t80m = ['This price is small 8', 'Dear customer 8', 'please add more price 8', 'Let continue adding price 8'];
            shuffle($t10m);
            shuffle($t20m);
            shuffle($t30m);
            shuffle($t40m);
            shuffle($t50m);
            shuffle($t60m);
            shuffle($t70m);
            shuffle($t80m);

            if(is_numeric($price)){
                if($price < $t10)
                {
                    $this->repeat($t10m[0].' <b>pay  <span class=="fa">&#8358;</span>'. number_format(($least+$t60), 2, '.', ','). '</b>');

                }elseif ($price < $t20) {
                    $this->repeat($t20m[0] .' <b>pay  <span class=="fa">&#8358;</span>'.number_format(($least+$t50), 2, '.', ','). '</b>');
                }elseif ($price < $t30) {
                    $this->repeat($t30m[0] .'<b> pay  <span class=="fa">&#8358;</span>'. number_format(($least+$t40), 2, '.', ','). '</b>');
                }elseif ($price < $t40) {
                    $this->repeat($t40m [0].' <b>pay  <span class=="fa">&#8358;</span>'. number_format(($least+$t30), 2, '.', ','). '</b>');
                }elseif ($price < $t50) {
                    $this->repeat($t50m[0] .' <b>pay  <span class=="fa">&#8358;</span>'. number_format(($least+$t20), 2, '.', ','). '</b>');
                }elseif ($price < $t60) {
                    $this->repeat($t60m[0] .' <b>pay  <span class=="fa">&#8358;</span>'.number_format(($least+$t10), 2, '.', ','). '</b>');
                }elseif ($price < $t70) {
                    $this->repeat($t70m [0].' <b>pay  <span class=="fa">&#8358;</span>'. number_format(($least+(0.5*$least)), 2, '.', ','). '</b>');
                }elseif ($price < $t80) {
                    $this->repeat($t80m[0] .' <b>pay  <span class=="fa">&#8358;</span>'. number_format(($least+(0.7*$least)), 2, '.', ','). '</b>');
                }
                // elseif($least > $price ){

                //     $this->repeat($que .'<span class=="fa">&#8358;</span>'. $least);
                // }
                else{
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
