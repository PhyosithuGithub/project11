<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;

class Category extends Model{
    protected $fillable =["name","slug"];

    public function genPaginate($limit){
        
        $table = $this->getTable();
        $categories =[];
        $cats =Capsule::select(" SELECT * FROM $table ORDER BY id DESC ".$limit);
        foreach($cats as $cat){
            $date = new Carbon($cat->created_at);
            array_push($categories,[
                "id"=>$cat->id,
                "name"=>$cat->name,
                "slug"=>$cat->slug,
                "created"=>$date->toFormattedDateString()
            ]);
        }
        return $categories;
    }
}