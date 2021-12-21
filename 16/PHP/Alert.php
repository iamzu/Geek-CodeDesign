<?php

namespace PHP;

class Alert
{
    /** @var AlertHandler[] */
    private $alertHandlers = [];

    public function addAlterHandler(AlertHandler $alertHandler): void
    {
        $this->alertHandlers[] = $alertHandler;
    }

    public function check(ApiStatInfo $apiStatInfo)
    {
        foreach ($this->alertHandlers as $alertHandler) {
            $alertHandler->check($apiStatInfo);
        }
    }
}
