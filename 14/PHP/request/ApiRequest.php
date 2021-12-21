<?php

namespace Request;

class ApiRequest
{
    private $baseUrl;
    private $token;
    private $appId;
    private $timestamp;


    public function __construct(string $url)
    {
        $this->baseUrl = $url;
        parse_str(parse_url($url,PHP_URL_QUERY), $urlArr);
        $this->token = $urlArr['token'];
        $this->appId = $urlArr['appId'];
        $this->timestamp = $urlArr['t'];
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }


}
