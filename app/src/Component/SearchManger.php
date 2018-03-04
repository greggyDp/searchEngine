<?php

namespace App\Component;

use App\Component\Helpers\DataParsing\JsonFiltersParser;
use App\Entity\Users;
use App\Exception\Filters\NoFiltersDetectedException;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Log\Logger;

class SearchManger
{
    /** @var EntityManager */
    private $em;

    /** @var Logger */
    private $logger;

    /** @var JsonFiltersParser */
    private $filtersParser;

    /**
     * SearchManger constructor.
     * @param EntityManager $em
     * @param Logger $logger
     * @param JsonFiltersParser $filtersParser
     */
    public function __construct(EntityManager $em, Logger $logger, JsonFiltersParser $filtersParser)
    {
        $this->em = $em;
        $this->logger = $logger;
        $this->filtersParser = $filtersParser;
    }

    /**
     * @param string $filters
     * @return mixed
     */
    public function search(string $filters): array
    {
        try {
            $queryString = $this->filtersParser->createQueryStringFromJsonFilters($filters);
            $searchResultsCollection = $this->em->getRepository(Users::class)->searchByFilters($queryString);
            $result = $searchResultsCollection->getSearchResults();
        } catch (NoFiltersDetectedException $e) {
            $this->logger->error($e->getMessage());
        }

        var_dump($result);die;
    }
}