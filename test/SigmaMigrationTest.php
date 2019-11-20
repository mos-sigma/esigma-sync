<?php

namespace Sigma\Sync\Test;

use Doctrine\DBAL\Schema\Schema;
use PHPUnit\Framework\TestCase;
use Sigma\Sync\SigmaMigration;

class SigmaMigrationTest extends TestCase
{
    private $abstractMigration;

    public function setUp(): void
    {
        $this->abstractMigration = new class extends SigmaMigration
        {
            public function __construct()
            {
            }

            public function up(Schema $schema): void
            {
            }

            public function down(Schema $schema): void
            {
            }

            public function triggerFields($fields)
            {
                return $this->triggerFormatedFields($fields);
            }

            public function fields($fields)
            {
                return $this->formatedFields($fields);
            }
        };
    }

    /**
     * @test
     */
    public function triggerFormatedFields()
    {
        $fields = $this->abstractMigration->triggerFields(['foo', 'bar']);

        $this->assertEquals('NEW.foo,NEW.bar', $fields);
    }

    /**
     * @test
     */
    public function formatedFields()
    {
        $fields = $this->abstractMigration->fields(['foo', 'bar']);

        $this->assertEquals('foo,bar', $fields);
    }
}
