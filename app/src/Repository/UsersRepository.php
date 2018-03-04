<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class UsersRepository extends EntityRepository
{
    public function searchByFilters(string $queryString): array
    {
        $records = $this->createQueryBuilder('u')
            ->select('u')
            ->distinct()
            ->join('u.usersAbout', 'ua')
            ->where($queryString)
            ->getQuery()
            ->getArrayResult();
        ;
        return $records;
    }
}