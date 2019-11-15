<?php

namespace Sigma\Sync;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\Migrations\Version\Version;
use Exception;

abstract class SigmaMigration extends AbstractMigration
{
    protected function triggerFormatedFields()
    {

        $fields = $this->version->getConfiguration()->sigmaParam('fields');

        $fields = array_map(function ($field) {

            return 'NEW.' . $field;
        }, $fields);

        $fields = implode(',', $fields);

        return $fields;
    }

    protected function formatedFields()
    {
        $fields = $this->version->getConfiguration()->sigmaParam('fields');

        $fields = implode(',', $fields);

        return $fields;
    }
}
