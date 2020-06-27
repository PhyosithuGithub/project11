<?php
namespace App\Controllers;

use App\Classes\Auth;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\SessionManager;
use App\Classes\ValidateRequest;
use App\Models\User;

class UserController extends BaseController{
    public function showLoginForm(){
        if(Auth::check()){
            Redirect::to("/cart");
        }else{
            view("user/login");
        }
    }
    public function login(){
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            $user = User::where("email",$post->email)->first();
            if($user){
                if(password_verify($post->password,$user->password)){
                    SessionManager::add("user_id",$user->id);
                    Redirect::to("/cart");
                }else{
                    SessionManager::flash("error_message","Wrong Password, Sir!");
                    Redirect::to("/user/login");
                }
            }else{
                SessionManager::flash("error_message","No User with that email, Sir!");
                Redirect::to("/user/login");
            }
        }else{
            SessionManager::flash("error_message","Token Mis Match Error!");
            Redirect::to("/user/login");
        }
    }
    public function showRegisterForm(){
        view("user/register");
    }
    public function register(){
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            if($post->password === $post->confirm_password){
                $rules =[
                    "name"=>["minLength"=>"5"],
                    "email"=>["unique"=>"users"],
                    "password"=>["minLength"=>"5"]
                ];
                $validator = new ValidateRequest();
                $validator->checkValidate($post,$rules);
                if($validator->hasError()){
                    beautify($validator->getErrors());
                }else{
                    $user =new User();
                    $user->user_name =$post->name;
                    $user->email = $post->email;
                    $user->password = password_hasH($post->password,PASSWORD_BCRYPT);
                    if($user->save()){
                        SessionManager::flash("success_message","Register Success! Please Login to be member!");
                        Redirect::to("/user/login");
                    }else{
                        SessionManager::flash("error_message","Register Fail! Please contact to Admin!");
                        Redirect::to("/user/register");
                    }
                }
            }else{
                SessionManager::flash("error_message","Password do not match!");
                Redirect::to("/user/register");
            }
        }else{
            SessionManager::flash("error_message","Token Mis Match Error!");
            Redirect::to("/user/register");
        }
    }
    public function logout(){
        SessionManager::remove("user_id");
        // session_destroy();
        Redirect::to("/");
    }
}