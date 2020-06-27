<?php
namespace App\Controllers;

use App\Classes\Auth;
use App\Classes\CSRFToken;
use App\Models\Order;
use App\Classes\Request;
use App\Classes\SessionManager;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;

class IndexController extends BaseController{
    public function show(){
        $prods = Product::all();
        list($products,$pages) = paginate(8, count($prods), new Product());
        $products = json_decode(json_encode($products));
        
        $featured = Product::where("featured",2)->get();
        view("home",compact("products","pages","featured"));
    }
    public function showCart(){
        view("cart");// automatic loadProduct function
       
    }
    public function cart(){
        $post = Request::get("post");        
        if(CSRFToken::checkToken($post->token)){
            $items = $post->cart;
            $carts = [];
            foreach($items as $item){
                $product = Product::where("id",$item)->first();
                $product->qty =1;
                array_push($carts,$product);
            }
            $products = json_encode($carts);
            echo $products;
            exit;
        }else{
            echo "Token Mis Match Error!";
            exit;
        }
       
    }
    // Payout
    public function payOut(){
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            SessionManager::replace("cart-items",$post->items);
            echo "Success";
            exit;
        }else{
            echo "Token Mist Match Exception!";
            exit;
        } 
    }
    public function saveItemsToDatabase($status="pending", $extraItems=""){
       $items= SessionManager::get("cart-items");
       $order_number = uniqid();
       $amounts =0;
       foreach($items as $item){
           $amounts += $item->qty * $item->price;
            $order_detail =new OrderDetail();
            $order_detail->user_id =Auth::user()->id;
            $order_detail->product_id =$item->id;
            $order_detail->unit_price=$item->price;
            $order_detail->status =$status;
            $order_detail->quantity =$item->qty;
            $order_detail->total =$item->qty * $item->price;
            $order_detail->order_no =$order_number;
            $order_detail->save();
       }

       $order = new Order();
       $order->user_id =Auth::user()->id;
       $order->order_no =$order_number;
       $order->order_extra =$extraItems;
       $order->save();

       $payment = new Payment();
       $payment->user_id =Auth::user()->id;
       $payment->amount =$amounts;
       $payment->status =$status;
       $payment->order_no =$order_number;
       if($payment->save()){
           return true;
       }else{
           return false;
       }
    }
    public function saveOrder($orders){
        $order =serialize($orders);
        return true;
    }
    public function productDetail($id){
        $product = Product::where("id",$id)->first();
        view("product",compact("product"));
    }
}