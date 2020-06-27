<?php
use App\Classes\ErrorHandler;
use App\Classes\Database;
if(!isset($_SESSION)) session_start();
define("APP_ROOT",realpath(__DIR__."/../"));
define("URL_ROOT","http://shop.ps/");

require_once APP_ROOT."/vendor/autoload.php";
new ErrorHandler();
require_once APP_ROOT."../app/config/_env.php";
new Database();
require_once APP_ROOT."../app/routing/router.php";

