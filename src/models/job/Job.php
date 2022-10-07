<?php

namespace App\ZoorificsAnimals\Models\Job;

use App\ZoorificsAnimals\models\Refactory;
use App\ZoorificsAnimals\models\job\JobEntity;


class Job extends Refactory
{
    /**
     * @author aurel
     * @param int $id
    */
    public function delete(int $id): void
    {
        $this->prepareAndExecute('DELETE FROM jobs WHERE id=:id', [
            $id
        ]);
    }

    /**
     * @author aurel
     * @param class $job
    */
    public function createJob(JobEntity $job): void
    {
        $this->prepareAndExecute('INSERT INTO jobs (post, role VALUES(:post, :role)', [
            ':post' => $job->getPost(),
            ':role' => $job->getRole()
        ]);
        $job->setId($this->pdo->lastInsertId());
    }

    /**
     * @author aurel
     * @param class $job
    */
    public function editJob(JobEntity $job): void
    {
        $this->prepareAndExecute('UPDATE jobs SET post=:post, role=:role WHERE id=:id', [
            ':post' => $job->getPost(),
            ':role' => $job->getRole(),
            ':id' => $job->getId()
        ]);
    }

    /**
     * @author aurel
     * @return $jobs[]
    */
    public function getJobs(): array
    {
        $pdo = $this->prepareAndExecute('SELECT * FROM jobs ORDER BY post, role ASC');
        $jobs = [];
        foreach ($pdo->fetchAll() as $row) {
            $job = new JobEntity();
            $job->setId(intval($row['id']));
            $job->setPost($row['post']);
            $job->setRole($row['role']);
            $jobs[] = $job;
        }

        return $jobs;
    }

    /**
     * @author aurel
     * @param int $id
     * @return $job
    */
    public function getJob(int $id): ?JobEntity
    {
        $this->prepareAndExecute('SELECT * FROM jobs WHERE id = ?', [
            $id
        ]);
        $job = new JobEntity();
        $job->getPost();
        $job->getRole();
        $job->getId();
        return $job;
    }
}
