<?php
namespace App\Classes;

class CSRFToken{
    public static function _token(){
        if(!SessionManager::has("token")){
          echo  SessionManager::add("token",base64_encode(openssl_random_pseudo_bytes(32)));
        }else{
            echo SessionManager::get("token");
        }
    }
    public static function checkToken($token){
        return SessionManager::get("token") === $token;
    }
}