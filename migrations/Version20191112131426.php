<?php

declare(strict_types=1);

namespace Sigma\Sync\Migrations;

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
        /** @var  Configuration $config  */
        $config = $this->version->getConfiguration();
        $table = $config->sigmaParam('table');
        $type = $config->sigmaParam('type');
        $fields = $this->triggerFormatedFields();

        $this->addSql(
            "CREATE TRIGGER update_checksum_on_insert
	                      AFTER INSERT ON $table 
	                      FOR EACH ROW
                          BEGIN
	                        INSERT INTO sigma_checksum (doc_id, doc_checksum, doc_type)
                            VALUES(NEW.id, MD5(CONCAT($fields)), ?) 
                            ON DUPLICATE KEY UPDATE doc_checksum = MD5(CONCAT($fields));
                       END;",
            [$type]
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER update_checksum_on_insert;');
    }
}
