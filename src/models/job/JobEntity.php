<?php

namespace App\ZoorificsAnimals\models\job;

class JobEntity
{
    /** @var int|null */
    protected $id;

    /** @var string|null */
    protected $post;

    /** @var array|null */
    protected $role;

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
     * @return string|null
     */
    public function getPost(): ?string
    {
        return $this->post;
    }

    /**
     * @param string|null $post
     */
    public function setPost(?string $post): void
    {
        $this->post = $post;
    }

    /**
     * @return array|null
     */
    public function getRole(): ?array
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     */
    public function setRole(?string $role): void
    {
        $this->role = $role;
    }
}
