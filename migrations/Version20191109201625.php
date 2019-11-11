<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191109201625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE sigma_checksum (
                       doc_id INT NOT NULL,
                       doc_checksum VARCHAR(255),
                       doc_type VARCHAR(50));');

        //TODO populate checksum table

        $this->addSql('ALTER TABLE sigma_checksum ADD CONSTRAINT unique_doc_id UNIQUE (doc_id);');

        $this->addSql('CREATE TRIGGER update_checksum
	                      AFTER UPDATE ON foo
	                      FOR EACH ROW
                          BEGIN
	                        INSERT INTO sigma_checksum (doc_id, doc_checksum, doc_type)
                            VALUES(NEW.id, MD5(CONCAT(NEW.name)), \'Document\') 
                            ON DUPLICATE KEY UPDATE doc_checksum = MD5(CONCAT(NEW.name));
                       END;');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sigma_checksum DROP INDEX unique_doc_id;');
        $this->addSql('DROP TABLE sigma_checksum;');
        $this->addSql('DROP TRIGGER update_checksum;');
    }
}
