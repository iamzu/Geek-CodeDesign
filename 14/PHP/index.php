<?php
require_once "vendor/autoload.php";
use Auth\DefaultApiAuthenticatorImpl;

$url = "geekbang?"
    . "appId=designpattern"
    . "&token=379b6f321e6257e189fb9baa2749dca7"
    . "&t=1636612140";

$validator  = new DefaultApiAuthenticatorImpl();

try {
    $validator->auth($url);
}catch (Exception $e){
    var_dump($e->getMessage());
}
