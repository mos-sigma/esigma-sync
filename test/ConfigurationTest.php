<?php

namespace Sigma\Sync\Test;

use Doctrine\DBAL\Connection;
use PHPUnit\Framework\TestCase;
use Sigma\Sync\Configuration;

class ConfigurationTest extends TestCase
{
    /**
     * @var Configuration
     */
    private $config;

    public function setUp(): void
    {
        $connectionMock = $this->createMock(Connection::class);

        $sigma = [
            'table' => 'foo',
            'type' => 'Sigma\Document\Document',
            'fields' => ['bar']
        ];

        $this->config = new Configuration($connectionMock, $sigma);
    }

    /**
     * @test
     */
    public function sigmaParam(): void
    {
        $table = $this->config->sigmaParam('table');

        $this->assertEquals('foo', $table);
    }
}
