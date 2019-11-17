<?php

declare(strict_types=1);

namespace Sigma\Sync\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Sigma\Sync\SigmaMigration;

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
     *
     * @SuppressWarnings("ExcessiveMethodLength")
     */
    public function up(): void
    {
        /** @var  Configuration $config  */
        $config = $this->version->getConfiguration();
        $table = $config->sigmaParam('table');
        $type = $config->sigmaParam('type');
        $fields = $this->formatedFields();

        $this->addSql("INSERT INTO sigma_checksum(doc_id,doc_checksum,doc_type)
                       SELECT id, MD5(CONCAT($fields)), ? FROM $table;", [$type]);
    }

    /**
     * Down queries
     *
     * @return void
     */
    public function down(): void
    {
        $this->addSql('TRUNCATE TABLE sigma_checksum;');
    }
}
