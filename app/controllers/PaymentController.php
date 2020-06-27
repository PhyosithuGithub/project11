<?php
namespace App\Controllers;

use App\Classes\Request;
use Stripe\Charge;
use Stripe\Customer;

class PaymentController{
    public function stripePayment(){
        $post = Request::get("post");
        $token = $post->stripeToken;
        $email = $post->stripeEmail;

        $customer =Customer::create([
            "email"=>$email,
            "source"=>$token
        ]);

        $charge =Charge::create([
            "customer"=>$customer->id,
            "amount"=>5000,
            "currency"=>"usd"
        ]);

        $status = $charge->status;
        $index = new IndexController();
        $result =$index->saveItemsToDatabase($status, json_encode($charge));
        if($result){
            view("payment");
        }else{
            view("cart");
        }
    }
}