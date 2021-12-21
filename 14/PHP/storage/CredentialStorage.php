<?php
namespace Storage;
interface CredentialStorage
{
    public function getPasswordByAppId($appId);
}
