<?php

namespace App\Entity\Dynamic;
use JsonSerializable;

/**
 * Class SearchResult
 * @package App\Entity\Dynamic
 */
class SearchResult implements JsonSerializable
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $role;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     */
    private $regDate;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getRegDate(): \DateTime
    {
        return $this->regDate;
    }

    public function setRegDate(\DateTime $regDate): self
    {
        $this->regDate = $regDate;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
