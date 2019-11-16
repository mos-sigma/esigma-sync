<?php

namespace Sigma\Sync;

use Doctrine\Migrations\AbstractMigration;

abstract class SigmaMigration extends AbstractMigration
{
    /**
     * Format fields for un in triger statement
     *
     * @return string
     */
    protected function triggerFormatedFields()
    {

        $fields = $this->version->getConfiguration()->sigmaParam('fields');

        $fields = array_map(function ($field) {

            return 'NEW.' . $field;
        }, $fields);

        $fields = implode(',', $fields);

        return $fields;
    }

    /**
     * Format fields for query use
     *
     * @return string
     */
    protected function formatedFields()
    {
        $fields = $this->version->getConfiguration()->sigmaParam('fields');

        $fields = implode(',', $fields);

        return $fields;
    }
}
