<?php

namespace PHP;

use PHP\Original\AlertRule;
use PHP\Original\Notification;

class TpsAlertHandler extends AlertHandler
{
    public function __construct(AlertRule $rule, Notification $notification)
    {
        parent::__construct($rule, $notification);
    }

    public function check(ApiStatInfo $apiStatInfo): void
    {
        $tps = $apiStatInfo->getRequestCount() / $apiStatInfo->getDurationOfSeconds();

        if ($tps > $this->rule->getMatchedRule($apiStatInfo->getApi())->getMaxTps()) {
            $this->notification->notify(Notification::URGENCY, "...");
        }
    }
}
