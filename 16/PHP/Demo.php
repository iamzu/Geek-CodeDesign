<?php

use PHP\ApiStatInfo;
use PHP\ApplicationContext;

$apiStatInfo = new ApiStatInfo();

ApplicationContext::getInstance()->getAlert()->check($apiStatInfo);
