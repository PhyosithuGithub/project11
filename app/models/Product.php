<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;
class Product extends Model{
    protected $fillable = [
        "name",
        "price",
        "cat_id",
        "sub_cat_id",
        "image",
        "description"
    ];
    public function genPaginate($limit){
        $table = $this->getTable();
        $products =[];
        $result =Capsule::select("SELECT * FROM $table ORDER BY id DESC".$limit);
        
        foreach($result as $item){
            $date = new Carbon($item->created_at);
            array_push($products,[
                "id"=>$item->id,
                "name"=>$item->name,
                "price"=>$item->price,
                "cat_id"=>$item->cat_id,
                "sub_cat_id"=>$item->sub_cat_id,
                "image"=>$item->image,
                "description"=>$item->description,
                "created"=>$date->toFormattedDateString()
            ]);
        }
        return $products;
    }
}