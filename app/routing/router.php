<?php
use App\Routing\routeDispatcher;
$router = new AltoRouter();


// $router->setBasePath("/project1/public");
$router->map("GET","/","App\Controllers\IndexController@show","Home Page");
$router->map("GET","/cart","App\Controllers\IndexController@showCart","Show Cart Page");
$router->map("POST","/cart","App\Controllers\IndexController@cart","Cart Page");
$router->map("POST","/payout","App\Controllers\IndexController@payOut","PayOut Page");
$router->map("GET","/product/[i:id]/detail","App\Controllers\IndexController@productDetail","Product Detail");
$router->map("POST","/payment/stripe","App\Controllers\PaymentController@stripePayment","Stripe Payment");



include "admin_route.php";
include "user_route.php";
new routeDispatcher($router);
