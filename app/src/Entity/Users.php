<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="email", columns={"email"})
 *     },
 *     indexes={
 *          @ORM\Index(name="email_password", columns={"email", "password"}),
 *          @ORM\Index(name="role_reg_date", columns={"role", "reg_date"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    public const TEST_ROLE = 'test';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=100, nullable=false)
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reg_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $regDate = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_visit", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $lastVisit = '0000-00-00 00:00:00';

    /**
     * @var ArrayCollection | UsersAbout[]
     *
     * @ORM\OneToMany(targetEntity="UsersAbout", mappedBy="user")
     */
    private $usersAbout;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->regDate = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return self
     */
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegDate(): \DateTime
    {
        return $this->regDate;
    }

    /**
     * @return \DateTime
     */
    public function getLastVisit(): \DateTime
    {
        return $this->lastVisit;
    }

    /**
     * @param \DateTime $lastVisit
     * @return self
     */
    public function setLastVisit(\DateTime $lastVisit): self
    {
        $this->lastVisit = $lastVisit;
        return $this;
    }
}
