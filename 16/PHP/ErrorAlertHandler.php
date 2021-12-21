<?php

namespace PHP;

use PHP\Original\AlertRule;
use PHP\Original\Notification;

class ErrorAlertHandler extends AlertHandler
{
    public function __construct(AlertRule $rule, Notification $notification)
    {
        parent::__construct($rule, $notification);
    }

    public function check(ApiStatInfo $apiStatInfo): void
    {
        if ($apiStatInfo->getErrorCount() > $this->rule->getMatchedRule($apiStatInfo->getApi())->getMaxErrorCount()) {
            $this->notification->notify(Notification::URGENCY, "...");
        }
    }
}
