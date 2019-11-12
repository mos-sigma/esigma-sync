<?php

namespace Sigma\Sync;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\Migrations\Version\Version;
use Exception;

abstract class SigmaMigration extends AbstractMigration
{
    protected function sigmaSync($key)
    {
        $connectionParams = $this->version->getConfiguration()->getConnection()->getParams();

        if (!isset($connectionParams['sigma'])) {
            throw new Exception('Not sigma configuration found');
        }

        return $connectionParams['sigma'][$key];
    }
}
