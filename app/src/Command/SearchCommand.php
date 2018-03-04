<?php

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SearchCommand
 * @package App\Command
 */
class SearchCommand extends ContainerAwareCommand
{
    /**
     * @inheritdoc
     *
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setName('app:search');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $a = json_encode([
            'or' => [
                ['u.id', '=', '1000'],
                ['ua.country', '!=', "'Russia'"],
            ]
        ]);

        $b = json_encode([
            'and' => [
                ['ua.county', '=', 'Russia'],
                ['us.state', '!=', 'active'],
                ['us.gavatar', '=', ''],
            ]
        ]);

        $c = json_encode([
            'or' => [
                ['!=', 'ua.country', 'Russia'],
                ['=', 'ua.state', 'active'],
            ],
            'and' => [
                ['=', 'u.email', 'user@domain.com'],
                ['!=', 'ua.firstname', '']
            ]
        ]);

        $this->getContainer()->get('app.search_manager')->search($a);
    }
}