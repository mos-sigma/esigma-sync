<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Sigma\Sync\SigmaMigration;

final class Version20191112131426 extends SigmaMigration
{
    public function getDescription(): string
    {
        return 'Create on insert trigger';
    }

    public function up(Schema $schema): void
    {
        $table = $this->sigmaSync('table');

        $this->addSql("CREATE TRIGGER update_checksum_on_insert
	                      AFTER INSERT ON $table 
	                      FOR EACH ROW
                          BEGIN
	                        INSERT INTO sigma_checksum (doc_id, doc_checksum, doc_type)
                            VALUES(NEW.id, MD5(CONCAT(NEW.name)), 'Document') 
                            ON DUPLICATE KEY UPDATE doc_checksum = MD5(CONCAT(NEW.name));
                       END;");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER update_checksum_on_insert;');
    }
}
