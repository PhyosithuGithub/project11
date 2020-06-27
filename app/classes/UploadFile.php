<?php
namespace App\Classes;

class UploadFile{
    protected $maxSize =2097152;
    protected $path;
    // protected $validExt =["jpg","jpeg","png","gif","bmp"];
    public function getName($file,$name=""){// change original filename
        if($name === ""){
            $name = pathinfo($file->file->tmp_name, PATHINFO_FILENAME); // to change file name using tmp with extention
        }
        $name = strtolower(str_replace(["_"," "],"-",$name));
        $hash = md5(microtime());
        $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
        
        return "{$name}-{$hash}.{$ext}";
    }
    public function checkSize($file){
        return $file->file->size > $this->maxSize ? true: false;
    }
    public function isImage($file){
        $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
        $validExt =["jpg","jpeg","png","gif","bmp"];
        return in_array($ext,$validExt);
    }
    public function getPath(){
        return $this->path;
    }
    public function move($file,$file_name=""){
        $name =$this->getName($file);
        if($this->isImage($file)){
            if(!$this->checkSize($file)){
                $path = APP_ROOT."/public/assets/uploads/";
                if(!is_dir($path)){
                    mkdir($path);
                }
                $this->path = URL_ROOT."assets/uploads/".$name;
                $file_path = $path.$name;
                return move_uploaded_file($file->file->tmp_name,$file_path);
            }else{
                // return "Image Size is exceeded!";
                return false;
            }
        }else{
            // return "Only Image Files are accepted! ";
            return false;
        }
    }
}