<?php

namespace App\ZoorificsAnimals\models\user;

use DateTime;

class UserEntity
{
    /** @var int|null */
    protected $id;

     /** @var string|null */
     protected $password;

    /** @var string|null */
    protected $firstname;

    /** @var string|null */
    protected $lastname;

    /** @var string|null */
    protected $email;

    /** @var string|null */
    protected $phone;

    /** @var datetime|null */
    protected $dateTokenAt;

    /** @var string|null */
    protected $token;

    /** @var datetime|null */
    protected $hiredAt;

    /** @var int|null */
    protected $jobId;

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
    public function getJobId(): ?int
    {
        return $this->job_id;
    }

    /**
     * @param int|null $id
     */
    public function setJobId(?int $jobId): void
    {
        $this->job_id = $jobId;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void
    {
        $this->name = $lastname;
    }

        /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $lastname
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTokenAt(): ?DateTime
    {
        return $this->date_token_at;
    }

    /**
     * @param DateTime|null $dateTokenAt
     */
    public function setDateTokenAt(?string $dateTokenAt): void
    {
        $this->date_token_at = $dateTokenAt;
    }

    /**
     * @return DateTime|null
     */
    public function getHiredAt(): ?DateTime
    {
        return $this->hired_at;
    }

    /**
     * @param DateTime|null $hiredAt
     */
    public function setHiredAt(?string $hiredAt): void
    {
        $this->hired_at = $hiredAt;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string|null $birthdatefirstame
     */
    public function setFirstName(?string $firstname): void
    {
        $this->first_name = $firstname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param email|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     */
    public function setToken(?string $token): void
    {
        $this->token = $token;
    }
}
