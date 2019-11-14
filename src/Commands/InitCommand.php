<?php


namespace Sigma\Sync\Commands;

use Doctrine\Migrations\Tools\Console\Command\MigrateCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class InitCommand extends MigrateCommand
{
    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('install')
            ->setDescription(
                'Execute a migration to a specified version or the latest available version.'
            );
    }


    public function execute(InputInterface $input, OutputInterface $output): ?int
    {
        return parent::execute($input, $output);
    }
}
