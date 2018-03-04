<?php

namespace App\Repository;

use App\Entity\Dynamic\SearchResultsCollection;
use Doctrine\ORM\EntityRepository;

class UsersRepository extends EntityRepository
{
    public function searchByFilters(string $queryString): SearchResultsCollection
    {
        $records = $this->createQueryBuilder('u')
            ->join('u.usersAbout', 'ua')
            ->where($queryString)
            ->getQuery()
            ->getResult()
        ;

        var_dump($records);die;
    }
}