<?php

declare(strict_types=1);

namespace Sigma\Sync\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20191112131426 extends AbstractMigration
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
        $fields = $config->sigmaParam('fields');
        $fields = array_map([$this, 'formatFields'], $fields);
        $placeholders = array_map([$this, 'formatPlaceholders'], $fields);
        $placeholders = implode(',', $placeholders);

        $fields[] = $type;

        $this->addSql(
            "CREATE TRIGGER update_checksum_on_insert
	                      AFTER INSERT ON $table 
	                      FOR EACH ROW
                          BEGIN
	                        INSERT INTO sigma_checksum (doc_id, doc_checksum, doc_type)
                            VALUES(NEW.id, MD5(CONCAT($placeholders)), ?) 
                            ON DUPLICATE KEY UPDATE doc_checksum = MD5(CONCAT(NEW.name));
                       END;",
            $fields
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER update_checksum_on_insert;');
    }

    private function formatFields($field)
    {
        return 'NEW.' . $field;
    }

    private function formatPlaceholders($field)
    {
        return '?';
    }
}
