<?php

namespace App\ZoorificsAnimals\models\ticket;

use DateTime;

class TicketEntity
{
    /** @var int|null */
    private $id;

    /** @var int|null */
    private $number;

    /** @var string|null */
    private $bought_at;

    /** @var int|null */
    private $price;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int|null $id
     */
    public function setNumber(?int $number): void
    {
        $this->number = $number;
    }

    /**
     * @return datetime|null
     */
    public function getBoughtAt(): ?datetime
    {
        return $this->bought_at;
    }

    /**
     * @param datetime|null $boughtAt
     */
    public function setBoughtAt(?string $boughtAt): void
    {
        $this->bought_at = $boughtAt;
    }

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }
}
