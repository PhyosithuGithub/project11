<?php
use voku\helper\Paginator;
use Philo\Blade\Blade;

#Philo Laravel Blade
function view($path,$data=[]){
    $views = APP_ROOT."/resources/views";
    $caches = APP_ROOT."/bootstrap/cache";

    $blade =new Blade($views,$caches);
    echo $blade->view()->make($path,$data)->render();
}
# for Mailer Dynamically
function make($filename, $data){
    extract($data);
    ob_start();
        require_once APP_ROOT."/resources/views/mails/".$filename.".php";
        $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

#to Format data coming with POST Method
function beautify($data){
    echo "<pre>".print_r($data,true)."</pre>";
}

#asset function for linking file
function asset($link){
    echo URL_ROOT."/assets/".$link;
}
#slug to use in URL for categories
function slug($value){
    $value =preg_replace('/[^'.preg_quote('_').'\pL\pN\s]+/u',"",mb_strtolower($value));
    $value =preg_replace('/[ _]/','-',$value);
    return $value;
}
#pagination
function paginate($num_of_record,$total_record,$object){
    
    $pages = new Paginator($num_of_record,'p');
    $categories =$object->genPaginate($pages->get_limit());
    $pages->set_total($total_record);
    
    return [$categories,$pages->page_links()];
}