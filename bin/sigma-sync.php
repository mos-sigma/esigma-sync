#!/usr/bin/env php

<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\Migrations\Tools\Console\Command;
use Sigma\Sync\ParameterHelper;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Helper\QuestionHelper;
use Doctrine\Migrations\Tools\Console\Helper\ConfigurationHelper;
use Doctrine\Migrations\Configuration\Configuration;
use Sigma\Sync\Configuration as SigmaConfiguration;

$config = include 'sigma.php';

$connection = DriverManager::getConnection($config['connection']);

$configuration = new SigmaConfiguration($connection, $config['sigma']);
$configuration->setName('Sigma init');
$configuration->setMigrationsNamespace('Sigma\Migrations');
$configuration->setMigrationsTableName('sigma_migration_versions');
$configuration->setMigrationsColumnName('version');
$configuration->setMigrationsColumnLength(255);
$configuration->setMigrationsExecutedAtColumnName('executed_at');
$configuration->setMigrationsDirectory('./migrations');
$configuration->setAllOrNothing(true);
$configuration->setCheckDatabasePlatform(false);

$helperSet = new HelperSet();
$helperSet->set(new QuestionHelper(), 'question');
$helperSet->set(new ConnectionHelper($connection), 'db');
$helperSet->set(new ParameterHelper($config['sigma']), 'sigma');
$helperSet->set(new ConfigurationHelper($connection, $configuration));

$cli = new Application('Sigma sync');
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);

$cli->addCommands(array(
    new Command\MigrateCommand(),
));

$cli->run();
