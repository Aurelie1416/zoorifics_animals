<?php

namespace App\ZoorificsAnimals\models\breed;

use DateTime;

class BreedEntity
{
    /** @var int|null */
    protected $id;

    /** @var string|null */
    protected $name;

    /** @var string|null */
    protected $description;

    /** @var int|null */
    protected $diedId;

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
    public function getDietId(): ?int
    {
        return $this->diet_id;
    }

    /**
     * @param int|null $dietId
     */
    public function setDietId(?int $dietId): void
    {
        $this->diet_id = $dietId;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
