<?php

namespace Sigma\Sync\Test;

use PHPUnit\Framework\TestCase;
use Sigma\Sync\Commands\InstallCommand;
use Sigma\Sync\Configuration;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommandTest extends TestCase
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
     * @var InstallCommand
     */
    private $installCommand;

    public function setUp(): void
    {
        $this->inputMock = $this->createMock(InputInterface::class);
        $this->outputMock = $this->createMock(OutputInterface::class);

        $this->configuration = $this->createMock(Configuration::class);
        $this->installCommand = $this->getMockBuilder(InstallCommand::class)
            ->setMethods(['canExecute'])
            ->getMock();
        $this->installCommand->setMigrationConfiguration($this->configuration);
    }
    /**
     * @test
     */
    public function execute(): void
    {
        $this->inputMock->expects($this->once())->method('setArgument')->with('version', 'latest');
        $this->inputMock->expects($this->once())->method('setOption')->with('all-or-nothing', true);

        $result = $this->installCommand->execute($this->inputMock, $this->outputMock);

        $this->assertEquals(1, $result);
    }
}
