<?php

namespace App\Entity;

use App\Exception\Doctrine\Columns\InvalidEnumValueException;
use Doctrine\ORM\Mapping as ORM;

/**
 * UsersAbout
 *
 * @ORM\Table(name="users_about",
 *     indexes={
 *          @ORM\Index(name="user", columns={"user"}),
 *          @ORM\Index(name="user_item_value", columns={"user", "item", "value"}),
 *          @ORM\Index(name="item", columns={"item"})
 *     }
 * )
 * @ORM\Entity
 */
class UsersAbout
{
    public const ENUM_ITEM_COUNTRY = 'country';
    public const ENUM_ITEM_FIRSTNAME = 'firstname';
    public const ENUM_ITEM_STATE = 'state';
    public const ENUM_ITEM_GAVATAR = 'gavatar';

    private const AVAILABLE_ITEMS = [
        self::ENUM_ITEM_COUNTRY,
        self::ENUM_ITEM_FIRSTNAME,
        self::ENUM_ITEM_STATE,
        self::ENUM_ITEM_GAVATAR,
    ];

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="item", type="string", nullable=false)
     */
    private $item;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=250, nullable=false)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $upDate = 'CURRENT_TIMESTAMP';

    /**
     * @var Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getItem(): string
    {
        return $this->item;
    }

    /**
     * @param string $item
     * @return self
     */
    public function setItem(string $item): self
    {
        if (!in_array($item, self::AVAILABLE_ITEMS)) {
            throw new InvalidEnumValueException('Invalid enum value for column `item`!');
        }

        $this->item = $item;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpDate(): \DateTime
    {
        return $this->upDate;
    }

    /**
     * @param \DateTime $upDate
     * @return self
     */
    public function setUpDate(\DateTime $upDate): self
    {
        $this->upDate = $upDate;
        return $this;
    }

    /**
     * @return Users
     */
    public function getUser(): Users
    {
        return $this->user;
    }

    /**
     * @param Users $user
     * @return self
     */
    public function setUser(Users $user): self
    {
        $this->user = $user;
        return $this;
    }
}
