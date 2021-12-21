<?php

namespace Auth;

use Request\ApiRequest;
use Storage\DefaultCredentialStorage;
use Token\AuthToken;

class DefaultApiAuthenticatorImpl implements ApiAuthenticator
{
    private $credentialStorage;

    public function __construct()
    {
        $this->credentialStorage = new DefaultCredentialStorage();
    }

    public function auth($url)
    {
        $apiRequest = new ApiRequest($url);
        $this->authApi($apiRequest);
    }

    public function authApi(ApiRequest $apiRequest)
    {
        $appid = $apiRequest->getAppId();
        $token = $apiRequest->getToken();
        $timestamp = $apiRequest->getTimestamp();
        $url = $apiRequest->getBaseUrl();
        $clientAuthToken = new AuthToken($token,$timestamp);
        if($clientAuthToken->isExpired()){
            throw new \Exception("Token is expired");
        }

        $password = $this->credentialStorage->getPasswordByAppId($appid);

        $serviceAuthToken = AuthToken::generate(compact(['appid','timestamp']),$password);
        if(!$clientAuthToken->match($serviceAuthToken)){
            throw new \Exception("Token verfication failed.");
        }

    }
}
