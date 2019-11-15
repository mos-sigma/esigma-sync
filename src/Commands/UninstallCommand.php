<?php

namespace Sigma\Sync\Commands;

use Doctrine\Migrations\Tools\Console\Command\MigrateCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UninstallCommand extends MigrateCommand
{
    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('uninstall')
            ->setAliases([])
            ->setDescription(
                'Uninstall sigma sync'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $input->setArgument('version', 'first');

        $input->setOption('all-or-nothing', true);

        return parent::execute($input, $output);
    }
}
