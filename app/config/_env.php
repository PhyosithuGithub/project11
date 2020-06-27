<?php
use Dotenv\Dotenv;
$dotEnv = Dotenv::createImmutable(APP_ROOT);
$dotEnv->load();

require_once __DIR__."/_stripe.php";