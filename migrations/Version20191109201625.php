<?php

declare(strict_types=1);

namespace Sigma\Sync\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20191109201625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Sigma checksum table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE sigma_checksum (
                       doc_id INT NOT NULL,
                       doc_checksum VARCHAR(255) NOT NULL,
                       doc_type VARCHAR(50) NOT NULL);');

        $this->addSql('ALTER TABLE sigma_checksum ADD CONSTRAINT unique_doc_id UNIQUE (doc_id, doc_type);');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sigma_checksum DROP INDEX unique_doc_id;');

        $this->addSql('DROP TABLE sigma_checksum;');
    }
}
