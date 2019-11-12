<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112131415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create on update trigger';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TRIGGER update_checksum_on_update
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
        $this->addSql('DROP TRIGGER update_checksum_on_update;');
    }
}
