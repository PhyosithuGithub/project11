<?php

use App\Classes\SessionManager;
use Stripe\Stripe;

$stripe =[
    "secret_key"=>getenv("STRIPE_SECRET_KEY"),
    "publishable_key"=>getenv("STRIPE_PUBLISHABLE_KEY")
];

SessionManager::replace("publishable_key", $stripe["publishable_key"]);
Stripe::setApiKey($stripe["secret_key"]);