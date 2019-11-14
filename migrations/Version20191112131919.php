<?php

declare(strict_types=1);

namespace Sigma\Sync\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20191112131919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Populate checksum table';
    }

    public function up(Schema $schema): void
    {
        /** @var  Configuration $config  */
        $config = $this->version->getConfiguration();
        $table = $config->sigmaParam('table');

        $this->addSql("INSERT INTO sigma_checksum(doc_id,doc_checksum,doc_type)
                       SELECT id, MD5(CONCAT(name)), 'Document' FROM $table;");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('TRUNCATE TABLE sigma_checksum;');
    }
}