<?php
namespace PHP\Original;

class Alert
{
    private AlertRule $rule;
    private Notification $notification;

    public function __construct(AlertRule $rule, Notification $notification)
    {
        $this->rule = $rule;
        $this->notification = $notification;
    }

    public function check($api, $requestCount, $errorCount, $timeoutCount, $durationOfSeconds)
    {
        $tps = $requestCount / $durationOfSeconds;

        if ($tps > $this->rule->getMatchedRule($api)->getMaxTps()) {
            $this->notification->notify(Notification::URGENCY, "...");
        }

        if ($errorCount > $this->rule->getMatchedRule($api)->getMaxErrorCount()) {
            $this->notification->notify(Notification::SEVERE, "...");
        }
        // 改动二: 添加接口超时处理逻辑
        $timeoutTps = $timeoutCount / $durationOfSeconds;
        if ($timeoutTps > $this->rule->getMatchedRule($api)->getMaxTimeoutTps()) {
            $this->notification->notify(Notification::URGENCY, "...");
        }
    }
}
