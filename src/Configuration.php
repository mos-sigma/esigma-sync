<?php


namespace Sigma\Sync;

use Doctrine\Migrations\Configuration\Configuration as DoctrineConfiguration;
use Doctrine\DBAL\Connection;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Finder\MigrationFinder;
use Doctrine\Migrations\OutputWriter;
use Doctrine\Migrations\QueryWriter;


class Configuration extends DoctrineConfiguration
{
    private $sigmaParams;

    public function __construct(
        Connection $connection,
        array $params,
        ?OutputWriter $outputWriter = null,
        ?MigrationFinder $migrationFinder = null,
        ?QueryWriter $queryWriter = null,
        ?DependencyFactory $dependencyFactory = null
    ) {
        parent::__construct($connection, $outputWriter, $migrationFinder, $queryWriter, $dependencyFactory);

        $this->sigmaParams = $params;
    }

    public function sigmaParam($name)
    {
        return $this->sigmaParams[$name];
    }
}
