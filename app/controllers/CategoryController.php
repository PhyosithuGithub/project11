<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\SessionManager;
use App\Classes\UpdateFile;
use App\Classes\ValidateRequest;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends BaseController{
    public function index(){
        $categories = Category::all();
        list($cats,$pages) = paginate(3,count($categories),new Category());

        $subcategories = SubCategory::all();
        list($sub_cats,$sub_pages) = paginate(3, count($subcategories), new SubCategory());

        $cats = json_decode(json_encode($cats));// want to use arrow exception operator
        $sub_cats = json_decode(json_encode($sub_cats));
        view("backend/category/create",compact("cats","pages","sub_cats","sub_pages"));
    }
    public function store(){
        $post =Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            $rules =[
                "name"=>["required"=>true,"minLength"=>"5","unique"=>"categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);
            if($validator->hasError()){
                $errors = $validator->getErrors();

                $categories = Category::all();
                list($cats,$pages) = paginate(3,count($categories),new Category());
                $cats = json_decode(json_encode($cats));// want to use arrow exception operator
                view("backend/category/create",compact("cats","errors","pages"));
            }else{
                $slug = slug($post->name);
                $category = Category::create([
                    "name"=>$post->name,
                    "slug"=>$slug
                ]);
                if($category){
                    $success = "Data have been Saved!";
                    // $sub_cats = SubCategory::all();
                    $categories = Category::all();
                    list($cats,$pages) = paginate(3,count($categories),new Category());
                    $cats = json_decode(json_encode($cats));// want to use arrow exception operator
                    view("backend/category/create",compact("cats","errors","success","pages"));
                }else{
                    $errors = "Fail to save data!";
                    // $sub_cats = SubCategory::all();
                    $categories = Category::all();
                    list($cats,$pages) = paginate(3,count($categories),new Category());
                    $cats = json_decode(json_encode($cats));// want to use arrow exception operator
                    view("backend/category/create",compact("cats","errors","success","pages"));
                }
            }
        }else{
            SessionManager::flash("error","CSRFToken Field error");
            Redirect::back();
        }
    }
    public function delete($id){
        $result =Category::destroy($id);
        if($result){
            SessionManager::flash("delete_success","Data have been deleted!");
            Redirect::to("/admin/category/create");
        }else{
            SessionManager::flash("delete_fail","Fail to Delete Data!");
            Redirect::to("/admin/category/create");
        }
    }
    public function update(){
        $post = Request::get('post');

        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name"=>["required"=>true,"minLength"=>"5","unique"=>"categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);

            if($validator->hasError()){
                header('HTTP/1.1 422 Validation Error!',true,422);
                echo json_encode($validator->getErrors());
                exit;
            }else{
                Category::where("id", $post->id)->update(["name"=>$post->name]);
                echo json_encode("Data Updated Successfully!");
                exit;
            }

        }else{
            header('HTTP/1.1 422 Token Mis-Match Exception Error',true,422);
            echo json_encode(["error"=>"Token Mis-Match Exception Error!"]);
            exit;
        }

    }
}