<?php

namespace Storage;

class DefaultCredentialStorage implements CredentialStorage
{

    private $arr = [
      'designpattern' => 'designpatternToken'
    ];

    public function getPasswordByAppId($appId)
    {
        return $this->arr[$appId];
    }
}
