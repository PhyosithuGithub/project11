<?php
namespace App\Classes;

class SessionManager{
    public static function has($key){
       return isset($_SESSION[$key]) ? true : false;
    }
    public static function add($key,$value){
        if(!self::has($key)){
            $_SESSION[$key] = $value;
        }else{
            echo "Session with that " . $key.  " already exists!";
        }
    }
    public static function get($key){
        if(self::has($key)){
            return $_SESSION[$key];
        }else{
            return null;
        }
    }
    public static function remove($key){
        if(self::has($key)){
            unset($_SESSION[$key]);
        }
    }
    public static function replace($key,$value){
        if(self::has($key)){
            self::remove($key);
            self::add($key,$value);
        }else{
            self::add($key,$value);
        }
    }
    public static function flash($key,$value=""){
        if(!empty($value)){
            self::replace($key,$value);
        }else{
            echo "<p class='alert alert-success alert-dismissable show fade'>".self::get($key)."
            <button class='close' data-dismiss='alert'>x</button>
            </p>";
            self::remove($key);
        }
    }
}