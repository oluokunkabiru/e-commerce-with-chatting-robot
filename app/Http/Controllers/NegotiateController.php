<?php

namespace App\Http\Controllers;

use App\Models\Product;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use tidy;

class NegotiateController extends Controller
{
    //
    protected $custmername = "oluokun";
    protected $product = "28";

    public function robot(){
        $botman = app('botman');
        $botman->hears('{message}', function($botman, $message) {
        $this->custmername = Auth::check() ? Auth::user()->name: "Customer";
        // $botman->typesAndWaits(2);

            if ($message == 'hi') {

                $this->askName($botman);

            }elseif($message == "hello"){
                // $this->say("hi dear");
                $botman->startConversation(new Negotiate($this->product, $this->custmername));
            }
            elseif(explode(",", $message)[0]=="negotiateme"){
                $this->negotiate($botman, explode(",", $message)[1], $this->custmername);

            }



        });

        $botman->hears('stop', function(BotMan $bot) {
            $bot->reply('Conversation ended');
        })->stopsConversation();



        $botman->listen();
    }


    public function askName($botman)

    {

        $botman->ask('Hello! What is your Name?', function(Answer $answer) {



            $name = $answer->getText();



            $this->say('Nice to meet you '.$name);

        });

    }




public function negotiate($botman, $message, $custmername){
    $product = Product::with(['picture', 'category'])->where('id', $message)->first();
    $picture= $product->picture ? $product->picture->file :"";
    $attachment = new Image(url($picture));

    // Build message object
    $msg = 'Dear <b>'. $custmername .'</b>, you about to negotiate this product with below details';
    $msg .= '<h3>Name : <b>'.ucwords($product->product_name).'</b> </h3>';
    $msg .= '<h4>Price : <span class="fa">&#8358;</span> '.$product->newprice .'</h4>';
    $msg .= '';

    $message = OutgoingMessage::create(html_entity_decode($msg))
                ->withAttachment($attachment);
        $productid = $product->id;

    // $botman->reply("write 'hi' for testing...");
        $botman->reply($message);
        // $botman->startConversation(new Negotiate($productid, $custmername));


        $question =  Question::create(html_entity_decode("Are you want to continue to negotiate ".ucwords($product->product_name) ))
        ->fallback('Unable to create negotiation link')
        ->callbackId('negotiatingstatus')
        ->addButtons([
            Button::create('Of course')->value('yes'),
            Button::create('Hell no!')->value('no'),
        ]);
        $botman->ask($question, function (Answer $answer) use($botman, $productid, $custmername){
            //   return  $answer->getText();
            // Detect if button was clicked:
                // $name = $this->custmername;
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getText(); // will be either 'yes' or 'no'
                if($selectedValue == "yes"){
                    $this->say(ucwords($custmername). ", How much do you want to pay");
                    // $this->ask("hello");

                        $botman->startConversation(new Negotiate($productid, $custmername));
                }else{
                    $this->say("Your negotion is terminated");

                }
            }

        });
       }

}
