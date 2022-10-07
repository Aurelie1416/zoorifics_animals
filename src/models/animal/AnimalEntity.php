<?php

namespace App\ZoorificsAnimals\models\animal;

use DateTime;

class AnimalEntity
{
    /** @var int|null */
    protected $id;

    /** @var string|null */
    protected $name;

    /** @var int|null */
    protected $breedId;

    /** @var string|null */
    protected $birthdate;

    /** @var datetime|null */
    protected $lastMedicalCheck;

    /** @var datetime|null */
    protected $nextMedicalCheckAt;

    /** @var string|null */
    protected $status;

    /** @var bool|null */
    protected $sexe;

    /** @var string|null */
    protected $image;

    /** @var int|null */
    protected $weight;

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
    public function getBreedId(): ?int
    {
        return $this->breed_id;
    }

    /**
     * @param int|null $breedId
     */
    public function setBreedId(?int $breedId): void
    {
        $this->breed_id = $breedId;
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
     * @return DateTime|null
     */
    public function getLastMedicalCheckAt(): ?DateTime
    {
        return $this->last_medical_check_at;
    }

    /**
     * @param DateTime|null $birthdate
     */
    public function setLastMedicalCheckAt(?string $lastMedicalCheck): void
    {
        $this->last_medical_check_at = $lastMedicalCheck;
    }

    /**
     * @return DateTime|null
     */
    public function getNextMedicalCheckAt(): ?DateTime
    {
        return $this->next_medical_check_at;
    }

    /**
     * @param DateTime|null $birthdate
     */
    public function setNextMedicalCheckAt(?string $nextMedicalCheckAt): void
    {
        $this->next_medical_check_at = $nextMedicalCheckAt;
    }

    /**
     * @return DateTime|null
     */
    public function getBornAt(): ?DateTime
    {
        return $this->born_at;
    }

    /**
     * @param DateTime|null $birthdate
     */
    public function setBornAt(?string $birthdate): void
    {
        $this->born_at = $birthdate;
    }

    /**
     * @return bool|null
     */
    public function getSexe(): ?bool
    {
        return $this->sexe;
    }

    /**
     * @param bool|null $sexe
     */
    public function setSexe(?bool $sexe): void
    {
        $this->sexe = $sexe;
    }

    /**
     * @return int|null
     */
    public function getWeight(): ?int
    {
        return $this->sexe;
    }

    /**
     * @param int|null $weight
     */
    public function setWeight(?int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }
}
