<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\SessionManager;
use App\Classes\UploadFile;
use App\Classes\ValidateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends BaseController{
    public function home(){
        $psd = Product::all();
        list($products,$pages) = paginate(3, count($psd), new Product());
        $products = json_decode(json_encode($products));
        view("backend/product/home",compact("products","pages"));
    }
    public function create(){
        $cats =Category::all();
        $sub_cats=SubCategory::all();
        view("backend/product/create",compact("cats","sub_cats"));
    }
    public function store(){
        $post=Request::get("post");
        $file = Request::get("file");
        if(CSRFToken::checkToken($post->token)){
            $rules =[
                "name"=>["required"=>true, "minLength"=>"5", "unique"=>"products"],
                "description"=>["required"=>true, "minLength"=>"20"]
            ];
            $validators = new ValidateRequest();
            $validators->checkValidate($post,$rules);
            if($validators->hasError()){
                $errors = $validators->getErrors();
                $cats =Category::all();
                $sub_cats=SubCategory::all();
                view("backend/product/create",compact("cats","sub_cats","errors"));
            }else{
                if(!empty($file->file->name)){
                    $uploadFile = new UploadFile();
                    $image_path =$uploadFile->move($file);
                    if($image_path){
                        $path = $uploadFile->getPath();
                        $con = Product::create([
                            "name"=>$post->name,
                            "price"=>$post->price,
                            "cat_id"=>$post->cat_id,
                            "sub_cat_id"=>$post->sub_cat_id,
                            "image"=>$path,
                            "description"=>$post->description
                            // This is a insert Data query
                        ]);
                        if($con->save()){
                            // $products = Product::all();
                            // beautify($products);
                            SessionManager::flash("create_product_success","Product Created Successfully!");
                            Redirect::to("/admin/product/home");
                        }else{
                            $errors =["Fail to Save Product Data!"];
                            $cats =Category::all();
                            $sub_cats=SubCategory::all();
                            view("backend/product/create",compact("cats","sub_cats","errors"));
                        }
                    }else{
                        $errors =["Plead Check Image Type and Size!"];
                        $cats =Category::all();
                        $sub_cats=SubCategory::all();
                        view("backend/product/create",compact("cats","sub_cats","errors"));
                    }
                }else{
                    $errors =["Image File Is Only!"];
                    $cats =Category::all();
                    $sub_cats=SubCategory::all();
                    view("backend/product/create",compact("cats","sub_cats","errors"));
                }
            }
        }else{
            $errors =["Token Mis Match Exception Error!"];
            $cats =Category::all();
            $sub_cats=SubCategory::all();
            view("backend/product/create",compact("cats","sub_cats","errors"));
        }
    }
    public function edit($id){
        $cats =Category::all();
        $sub_cats=SubCategory::all();
        $product = Product::where("id",$id)->FirstOrFail();
        // beautify($product);
        view("backend/product/edit",compact("product","cats","sub_cats"));
    }
    public function update($id){
        $post = Request::get("post");
        $file = Request::get("file");
        $f_path ="";
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name"=> ["required"=>true, "minLength"=>"5", "unique"=>"products"],
                "description"=>["required"=>true, "minLength"=>"20"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);
            if($validator->hasError()){
                $product = Product::where("id",$id)->first();
                $errors = $validator->getErrors();
                $cats =Category::all();
                $sub_cats=SubCategory::all();
                view("backend/product/edit",compact("cats","sub_cats","errors","product"));
            }else{
                if(empty($file->file->name)){
                    $f_path = $post->old_image;
                }else{
                   $uploadFile= new UploadFile;
                   if($uploadFile->move($file)){
                       $f_path =$uploadFile->getPath();
                   }else{
                    $product = Product::where("id",$id)->first();
                    $errors = ["File Move Error!"];
                    $cats =Category::all();
                    $sub_cats=SubCategory::all();
                    view("backend/product/edit",compact("cats","sub_cats","errors","product"));
                   }
                }

                $product = Product::where("id",$id)->first();
                $product->name = $post->name;
                $product->price = $post->price;
                $product->cat_id =$post->cat_id;
                $product->sub_cat_id = $post->sub_cat_id;
                $product->image = $f_path;
                $product->description = $post->description;
                if($product->update()){
                    SessionManager::flash("create_product_success","Product Update Successfully!");
                    Redirect::to("/admin/product/home");
                }else{
                    $product = Product::where("id",$id)->first();
                    $errors = ["Fail to Update Product!"];
                    $cats =Category::all();
                    $sub_cats=SubCategory::all();
                    view("backend/product/edit",compact("cats","sub_cats","errors","product"));
                }
            }
        }else{
            SessionManager::flash("Token_error","Token Mis Match Exception Error!");
            Redirect::to("/admin/product/".$id."/edit");
        }
    }
    public function delete($id){
        $result =Product::destroy($id);
        if($result){
            SessionManager::flash("create_product_success","Product have been deleted successfully!");
            Redirect::to("/admin/product/home");
        }else{
            SessionManager::flash("create_product_success","Product have been deleted successfully!");
            Redirect::to("/admin/product/home");
        }
    }
}