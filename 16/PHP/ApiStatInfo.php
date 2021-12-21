<?php

namespace PHP;

class ApiStatInfo
{
    private string $api;
    private int $requestCount;
    private int $errorCount;

    /**
     * @return string
     */
    public function getApi(): string
    {
        return $this->api;
    }

    /**
     * @param  string  $api
     */
    public function setApi(string $api): void
    {
        $this->api = $api;
    }

    /**
     * @return int
     */
    public function getRequestCount(): int
    {
        return $this->requestCount;
    }

    /**
     * @param  int  $requestCount
     */
    public function setRequestCount(int $requestCount): void
    {
        $this->requestCount = $requestCount;
    }

    /**
     * @return int
     */
    public function getErrorCount(): int
    {
        return $this->errorCount;
    }

    /**
     * @param  int  $errorCount
     */
    public function setErrorCount(int $errorCount): void
    {
        $this->errorCount = $errorCount;
    }

    /**
     * @return int
     */
    public function getDurationOfSeconds(): int
    {
        return $this->durationOfSeconds;
    }

    /**
     * @param  int  $durationOfSeconds
     */
    public function setDurationOfSeconds(int $durationOfSeconds): void
    {
        $this->durationOfSeconds = $durationOfSeconds;
    }

    private int $durationOfSeconds;
}
