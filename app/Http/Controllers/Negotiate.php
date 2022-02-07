<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Product;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Hamcrest\Type\IsNumeric;

class Negotiate extends Conversation
{


    protected $productid;

    protected $customer;
    protected $qty;

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
        $this->askPrice($this->productid, $this->customer);

    }

    public function askPrice($id, $customer){

        $this->ask("Please provide the numbers of quantity(s)", function(Answer $answer) use($id){
            if(is_numeric($answer->getText())){
                // if()
                $qty = $answer->getText();
                if($qty > 0 ){
                $product = Product::where('id', $id)->first();
                $percent = 0;
                $least = $product->oldprice * $qty;
                $normal = $product->newprice * $qty;
                $productid = $product->id;
                if($qty < 2){
                    $percent = 2;
                }elseif($qty >= 2 && $qty < 5){
                    $percent = 5;
                }elseif ($qty >= 5 && $qty < 10) {
                    $percent = 6;
                }elseif ($qty >= 10 && $qty < 20) {
                    $percent = 8;
                }elseif ($qty >= 20 && $qty < 40) {
                    $percent = 9;
                }elseif ($qty >= 40 && $qty < 70) {
                    $percent = 10;
                }elseif($qty >= 70 && $qty < 200) {
                    $percent = 12;
                }elseif($qty >= 200) {
                    $percent = 15;
                }else{
                    $percent = 0;
                }

                $prices = $normal - abs($percent/100)*$normal;
                $this->say(html_entity_decode("Normal Price = <span class='fa'>&#8358;</span>$normal <br>Quantity (s) = $qty <br>Discount = $percent% <br>Minimum Price = <span class='fa'>&#8358;</span>$prices"));
                    $this->ask('How much do you want pay for  <b> '. $qty .'</b> quantities of  <b> '.  ucwords($product->product_name)."</b>", function(Answer $answer) use ($prices, $least, $normal, $productid, $qty){

                        // while(! $accept){
                            // $this->say("Price $prices");
                        $price = $answer->getText();
                        $t10 = (0.1*$prices);
                        $t20 = (0.2*$prices);
                        $t30 = (0.3*$prices);
                        $t40 = (0.4*$prices);
                        $t50 = (0.5*$prices);
                        $t60 = (0.6*$prices);
                        $t70 = (0.7*$prices);
                        $t80 = (0.8*$prices);
                        $t90 = (0.9*$prices);
                        $t10 = (0.9999*$prices);

                        $unaccept = array('This price is not accepted', 'This product is worth more than this price', 'Add more to this price',
                        'You can get it the product by adding more price', 'Please there is this money now, let spend it. So add more price');
                        // $i++;


                        $accept = ['Negotiaon accepted', 'Continue to order', 'Accepted', 'Pay now', 'Yes, order now', 'Dear beautiful/handsome customer, pay now', 'Ordering is sure'];
                        $t10m = ['OOPs, this price is very small customer', 'This is too small', 'Ahhhh, its not accepted', 'Why this small, increase your price'];
                        $t20m = ['I m going to need a better price', 'This product worth more than what you are offering, add to the price', 'please add more price', 'Let continue adding price'];
                        $t30m = ['The price offer is unacceptable', 'This product worth more than what you are offering, add to the price', 'This price is not accepted', 'Let continue adding price'];
                        $t40m = ['Wow, that price is too low for this product', 'This product worth more than what you are offering, add to the price', 'please add more price', 'Let continue adding price'];
                        $t50m = ['Can you please add more value to the price', 'This price is not accepted', 'This product worth more than what you are offering, add to the price', 'This product worth more than what you are offering'];
                        $t60m = ['Can you please go higher about the price', 'This product has 99.7% reliability rate, so please add more to the value of the product', 'please add more price', 'Let continue adding price'];
                        $t70m = ['This product has 99.7% reliability rate, so please add more to the value of the product', 'This product worth more than what you are offering', 'please add more price', 'Let continue adding price'];
                        $t80m = ['This product worth more than what you are offering, add to the price', 'This price is not accepted', 'please add more price', 'Let continue adding price'];
                        shuffle($unaccept);
                        // $que = $unaccept[0];
                        shuffle($t10m);
                        shuffle($t20m);
                        shuffle($t30m);
                        shuffle($t40m);
                        shuffle($t50m);
                        shuffle($t60m);
                        shuffle($t70m);
                        shuffle($t80m);
                        shuffle($accept);

                        if(is_numeric($price)){

                            if($price < $t10)
                            {
                                $this->repeat($t10m[0]);
                                    }elseif ($price < $t20) {
                                $this->repeat($t20m[0] );
                                    }elseif ($price < $t30) {
                                $this->repeat($t30m[0] );
                                    }elseif ($price < $t40) {
                                $this->repeat($t40m [0]);
                                    }elseif ($price < $t50) {
                                $this->repeat($t50m[0] );
                                    }elseif ($price < $t60) {
                                $this->repeat($t60m[0] );
                                    }elseif ($price < $t70) {
                                $this->repeat($t70m [0]);

                            }elseif ($price < $t80) {
                                $this->repeat($t80m[0] );

                            }
                            elseif ($price < $t90) {
                                $this->repeat($t80m[0] );

                            }
                            elseif ($price < $t10) {
                                $this->repeat($t70m[0] );

                            }
                            // elseif($least > $price ){

                            //     $this->repeat($que .'<span class=="fa">&#8358;</span>'. $least);
                            // }
                            else{
                                $this->say( $accept[0]  .' with .'. $price);
                                $productid = $productid;
                                $this->ask("Are you sure you want to continue with the ordering of this product <br> <b>Yes</b> to continue ordering <br> <b>No</b> to continue negotiation", function(Answer $answer) use ($price, $productid, $qty){
                                    if(strtolower($answer->getText())=="yes"){

                                        // $this->say($qty);
                                        // $this->ask("Please provide the numbers of quantity", function(Answer $answer) use($price){
                                        //     if(is_numeric($answer->getText())){
                                        //         $qty = $answer->getText();
                                                $price = $qty > 1 ? number_format($price/$qty, 2):$price/$qty;
                                                $this->say("<h2>Product/Price =  <span class='fa'>&#8358;</span>$price</h2> ");
                                                $product = Product::where('id', $this->productid)->first();

                                                $dublicate = Cart::search(function($cartItem, $rowId) use($product)
                                                {
                                                    return $cartItem->id === $product->id;
                                                });
                                                if($dublicate->isNotEmpty())
                                                {
                                                    $this->say('<b>Fail</b> :  This item  was already added');
                                                }
                                            Cart::add($product->id, $product->product_name, $qty, $price)->associate('App\Models\Product');
                                                $this->say("<h3>Product added to cart successfully</h3>

                                                ");
                                                $this->say('<h3>Thanks for your patronage</h3> <br><p>Type <b>stop</b> to end this conversation</p>');

                                        //     }else{
                                        //         $this->repeat("Please enter the quantity in number format like <b>5</b>");
                                        //     }
                                        // });

                                    }else{
                                        $this->askPrice($this->productid, $this->customer);
                                    }
                                });
                            }

                        }else{
                            $this->repeat("Please enter your wish quantities in number format like 200");
                        }


                    });
                // }while($i < 4);

                }else{
                  $this->repeat("Please enter the quantity in positive integer number format like <b>5</b>");

                }
            }else{
                $this->repeat("Please enter the quantity in number format like <b>5</b>");
            }
            });

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
