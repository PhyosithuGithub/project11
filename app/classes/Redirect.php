<?php
namespace App\Classes;

class Redirect{
    public static function to($page){
        header("Location:$page");
    }
    public static function back(){
        $url = $_SERVER["REQUEST_URL"];
        header("Location:$url");
    }
}