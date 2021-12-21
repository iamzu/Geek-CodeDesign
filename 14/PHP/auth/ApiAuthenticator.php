<?php
namespace Auth;
use Request\ApiRequest;

interface ApiAuthenticator{
    public function auth($url);
    public function authApi(ApiRequest  $apiRequest);
}
