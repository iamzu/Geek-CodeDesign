<?php
namespace PHP\Original;

class AlertRule
{
    private string $ruleKey;

    private string $tpsKey = 'MAX_TPS';

    private string $errorKey = 'MAX_ERROR_COUNT';

    private string $timeoutKey = 'MAX_ERROR_COUNT';


    private array $rule;

    public function __construct()
    {
        $this->rule = [
            'Example' => [
                $this->tpsKey     => 10,
                $this->errorKey   => 10,
                $this->timeoutKey => 10
            ]
        ];
    }


    public function getMatchedRule($api): \AlertRule
    {
        $this->ruleKey = $api;
        return $this;
    }

    public function getMaxTps(): int
    {
        if (empty($this->ruleKey)) {
            return 0;
        }
        return $this->rule[$this->ruleKey][$this->tpsKey] ?? 0;
    }

    public function getMaxErrorCount(): int
    {
        if (empty($this->ruleKey)) {
            return 0;
        }
        return $this->rule[$this->ruleKey][$this->errorKey] ?? 0;
    }

    public function getMaxTimeoutTps(): int
    {
        if (empty($this->ruleKey)) {
            return 0;
        }
        return $this->rule[$this->ruleKey][$this->timeoutKey] ?? 0;
    }
}
