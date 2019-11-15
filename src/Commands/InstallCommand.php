<?php


namespace Sigma\Sync\Commands;

use Doctrine\Migrations\Tools\Console\Command\MigrateCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends MigrateCommand
{
    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('install')
            ->setAliases([])
            ->setDescription(
                'Install sigma sync'
            )->setHelp(
                <<<EOT
You can also time all the different queries if you wanna know which one is taking so long:

    <info>%command.full_name% --query-time</info>
EOT
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $input->setArgument('version', 'latest');

        $input->setOption('all-or-nothing', true);

        return parent::execute($input, $output);
    }
}
