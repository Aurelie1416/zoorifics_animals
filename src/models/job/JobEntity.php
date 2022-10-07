<?php

namespace App\ZoorificsAnimals\models\job;

class JobEntity
{
    /** @var int|null */
    private $id;

    /** @var string|null */
    private $post;

    /** @var array|null */
    private $role;

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
    public function setPost(?int $post): void
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
     * @param array|null $role
     */
    public function setRole(?array $role): void
    {
        $this->role = $role;
    }
}
