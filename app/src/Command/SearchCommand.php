<?php

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SearchCommand extends ContainerAwareCommand
{
    protected function configure(): void
    {
        $this
            ->setName('app:search');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $this->getContainer()->get('app.search_manager')->search();
    }
}
