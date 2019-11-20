<?php

namespace Sigma\Sync\Test;

use PHPUnit\Framework\TestCase;
use Sigma\Sync\Commands\UninstallCommand;
use Sigma\Sync\Configuration;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UninstallCommandTest extends TestCase
{
    /**
     * @var InputInterface
     */
    private $inputMock;

    /**
     * @var OutputInterface
     */
    private $outputMock;

    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var UninstallCommand
     */
    private $uninstallCommand;

    public function setUp(): void
    {
        $this->inputMock = $this->createMock(InputInterface::class);
        $this->outputMock = $this->createMock(OutputInterface::class);

        $this->configuration = $this->createMock(Configuration::class);
        $this->uninstallCommand = $this->getMockBuilder(UninstallCommand::class)
            ->setMethods(['canExecute'])
            ->getMock();
        $this->uninstallCommand->setMigrationConfiguration($this->configuration);
    }
    /**
     * @test
     */
    public function execute(): void
    {
        $this->inputMock->expects($this->once())->method('setArgument')->with('version', 'first');
        $this->inputMock->expects($this->once())->method('setOption')->with('all-or-nothing', true);

        $result = $this->uninstallCommand->execute($this->inputMock, $this->outputMock);

        $this->assertEquals(1, $result);
    }
}
