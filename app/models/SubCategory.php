<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
class SubCategory extends Model{

    public function genPaginate($limit){
        $table = $this->getTable();
        $subcategories =[];
        $subcats =Capsule::select("SELECT * FROM $table ORDER BY id DESC".$limit);
        
        foreach($subcats as $subcat){
            $date = new Carbon($subcat->created_at);
            array_push($subcategories,[
                "id"=>$subcat->id,
                "name"=>$subcat->name,
                "cat_id"=>$subcat->cat_id,
                "created"=>$date->toFormattedDateString()
            ]);
        }
        return $subcategories;
    }
}