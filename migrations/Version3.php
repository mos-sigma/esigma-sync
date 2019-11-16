<?php

declare(strict_types=1);

namespace Sigma\Sync\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Sigma\Sync\SigmaMigration;

final class Version3 extends SigmaMigration
{
    /**
     * Description
     * 
     * @return string
     */
    public function getDescription(): string
    {
        return 'Create on insert trigger';
    }

    /**
     * Up queries
     *
     * @param Schema $schema
     *
     * @return void
     */
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

    /**
     * Down queries
     *
     * @param Schema $schema
     *
     * @return void
     */
    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER update_checksum_on_insert;');
    }
}
