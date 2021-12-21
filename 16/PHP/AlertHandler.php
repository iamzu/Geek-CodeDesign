<?php

namespace PHP;

use PHP\Original\AlertRule;
use PHP\Original\Notification;

abstract class AlertHandler
{
    protected AlertRule $rule;
    protected Notification $notification;

    public function __construct(AlertRule $rule, Notification $notification)
    {
        $this->rule = $rule;
        $this->notification = $notification;
    }

    public function check(ApiStatInfo $apiStatInfo): void { }
}
