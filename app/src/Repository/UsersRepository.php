<?php

namespace App\Repository;

use App\Entity\Dynamic\SearchResult;
use App\Entity\Dynamic\SearchResultsCollection;
use App\Entity\Users;
use Doctrine\ORM\EntityRepository;

class UsersRepository extends EntityRepository
{
    public function searchByFilters(string $queryString): SearchResultsCollection
    {
        $users = $this->createQueryBuilder('u')
            ->select('u')
            ->distinct()
            ->join('u.usersAbout', 'ua')
            ->where($queryString)
            ->getQuery()
            ->getResult();
        ;
        $collection = new SearchResultsCollection();
        /** @var Users[] $users */
        foreach ($users as $user) {
            $searchResult = (new SearchResult())
                ->setId($user->getId())
                ->setEmail($user->getEmail())
                ->setRole($user->getRole())
                ->setRegDate($user->getRegDate())
            ;

            $collection->addSearchResult($searchResult);
        }
        
        return $collection;
    }
}