<?php

namespace App\Component;


use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Log\Logger;

class SearchManger
{
    /** @var EntityManager */
    private $em;

    /** @var Logger */
    private $logger;

    public function __construct(EntityManager $em, Logger $logger)
    {
        $this->em = $em;
        $this->logger = $logger;
    }

    public function search()
    {
        var_dump('hello!');
    }
}