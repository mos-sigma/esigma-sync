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
    /** * @var array
     */
    private $sigmaParams;

    public function __construct(
        Connection $connection,
        array $sigmaParams,
        ?OutputWriter $outputWriter = null,
        ?MigrationFinder $migrationFinder = null,
        ?QueryWriter $queryWriter = null,
        ?DependencyFactory $dependencyFactory = null
    ) {
        parent::__construct($connection, $outputWriter, $migrationFinder, $queryWriter, $dependencyFactory);

        $this->sigmaParams = $sigmaParams;
    }

    /**
     * Retuns the array value for
     * the given name
     *
     * @param string $key
     * @return void
     */
    public function sigmaParam(string $key)
    {
        return $this->sigmaParams[$key];
    }
}
