<?php
namespace App\Routing;

use AltoRouter;
class routeDispatcher{
    private $match;
    private $controller;
    private $method;
    
    public function __construct(AltoRouter $router)
    {
        $this->match = $router->match();

        if($this->match){
            list($controller,$method) = explode("@",$this->match["target"]);
            $this->controller = $controller;
            $this->method = $method;
            if(is_callable([new $this->controller, $this->method])){
                call_user_func_array([new $this->controller,$this->method],$this->match["params"]);
            }else{
                echo "It is not callable!";
            }

        }else{
            header($_SERVER["SERVER_PROTOCAOL"]."404 not found!");
            echo "Route does not Match!";
        }
    }
}