<?php

namespace App\Entity\Dynamic;

use App\Entity\Users;

/**
 * Class SearchResult
 * @package App\Entity\Dynamic
 */
class SearchResult
{
    /**
     * @var Users
     * @Assert\NotBlank()
     */
    private $user;

    /**
     * @return Users
     */
    public function getUser(): Users
    {
        return $this->user;
    }

    /**
     * @param Users $user
     */
    public function setUser(Users $user): void
    {
        $this->user = $user;
    }
}
