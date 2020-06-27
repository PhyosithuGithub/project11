<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\SessionManager;
use App\Classes\ValidateRequest;
use App\Models\SubCategory;

class SubCategoryController extends BaseController{
    public function store(){
       $post = Request::get("post");
       if(CSRFToken::checkToken($post->token)){
           $rules =[
               "name"=>["required"=>true, "minLength"=>"5", "unique"=>"sub_categories"]
           ];
           $validator = new ValidateRequest();
           $validator->checkValidate($post,$rules);
           if($validator->hasError()){
               header("HTTP/1.1 422 Validation Error",true,422);
               $errors = $validator->getErrors();
               echo json_encode($errors);
               exit;
           }else{
            $subcat = new SubCategory();
            $subcat->name = $post->name;
            $subcat->cat_id = $post->id;
            if($subcat->save()){
                echo "Sub Category Create Sucessfully!";
                exit;
            }else{
                header("HTTP/1.1 422 Fail to create SubCategory!",true, 422);
                $error = ["name"=>"Fail to create SubCategory!"];
                echo json_encode($error);
                exit;
            }
           }
       }else{
           header("HTTP/1.1 422 Token Mis-Match Error!",true,422);
           $errors = "Token Mis-Match Error!";
           echo $errors;
           exit;
       }
       
    }
    public function update(){
        $post =Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            $rules =[
                "name"=>["required"=>true, "minLength"=>"5", "unique"=>"sub_categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);
            if($validator->hasError()){
                header("HTTP/1.1 422 Validation Error", true, 422);
                $errors = $validator->getErrors();
                echo json_encode($errors);
                exit;
            }else{
                SubCategory::where("id",$post->id)->update(["name"=>$post->name]);
                echo "Data Have been Updated!";
                exit;
            }
        }else{
            header("HTTP/1.1 422 Token Mis-Match Error",true,422);
            echo "Token Mis-Match Error!";
            exit;
        }
        
    }
    public function delete($id){
        $result =SubCategory::destroy($id);
        if($result == true){
            SessionManager::flash("delete_success","SubCategory Deleted Successfully!");
            Redirect::to("/admin/category/create");
        }else{
            SessionManager::flash("delete_fail","Fail to Delete Data!");
            Redirect::to("/admin/category/create");
        }
    }
}