<?php

namespace PHP;

use PHP\Original\AlertRule;
use PHP\Original\Notification;

class ApplicationContext
{
    private AlertRule $alertRule;

    private Notification $notification;

    private Alert $alert;

    private static ApplicationContext $instance;

    public function getAlert(): Alert { return $this->alert; }

    public function initializeBeans()
    {
        $this->alertRule = new AlertRule();
        $this->notification = new Notification();
        $this->alert = new Alert();
        $this->alert->addAlterHandler(new TpsAlertHandler($this->alertRule, $this->notification));
        $this->alert->addAlterHandler(new ErrorAlertHandler($this->alertRule, $this->notification));
    }

    private function __construct()
    {
        $this->initializeBeans();
    }

    /**
     * 因php不支持饿汉单例故使用懒汉单例
     * @return ApplicationContext
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}


