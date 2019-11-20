<?php

declare(strict_types=1);

namespace Sigma\Sync\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Sigma\Sync\SigmaMigration;

/**
 * @SuppressWarnings("unused")
 */
final class Version4 extends SigmaMigration
{
    /**
     * Description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return 'Populate checksum table';
    }

    /**
     * Up queries
     *
     * @return void
     */
    public function up(Schema $schema): void
    {
        /** @var  Configuration $config  */
        $config = $this->version->getConfiguration();
        $table = $config->sigmaParam('table');
        $type = $config->sigmaParam('type');
        $fields = $config->sigmaParam('fields');

        $fields = $this->formatedFields($fields);

        $this->addSql("INSERT INTO sigma_checksum(doc_id,doc_checksum,doc_type)
                       SELECT id, MD5(CONCAT($fields)), ? FROM $table;", [$type]);
    }

    /**
     * Down queries
     *
     * @return void
     */
    public function down(Schema $schema): void
    {
        $this->addSql('TRUNCATE TABLE sigma_checksum;');
    }
}
