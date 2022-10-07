<?php

namespace App\ZoorificsAnimals\models\activity;

use App\ZoorificsAnimals\models\Refactory;
use App\ZoorificsAnimals\models\activity\ActivityEntity;


    class Activity extends Refactory
    {
        /**
         * @author aurel
         * @param int $id
        */
        public function delete(int $id): void
        {
            $this->prepareAndExecute('DELETE FROM activities WHERE id=:id', [
                $id
            ]);
        }
        
        /**
         * @author aurel
         * @param class $activity
        */
        public function createActivity(ActivityEntity $activity): void
        {
            $this->prepareAndExecute('INSERT INTO activities (name, description, schedule, employee_id) VALUES(":name", ":description", ":schedule", ":employee_id")', [
                ':name' => $activity->getName(),
                ':description' => $activity->getDescription(),
                ':schedule' => $activity->getSchedule(),
                ':employee_id' => $activity->getUserId()
            ]);
        }

        /**
         * @author aurel
         * @param class $activity
        */
        public function editActivity(ActivityEntity $activity): void
        {
            $this->prepareAndExecute('UPDATE activities SET name=:name, description=:description, schedule=:schedule, employee_id=:employee_id WHERE id=:id', [
                ':name' => $activity->getName(),
                ':description' => $activity->getDescription(),
                ':schedule' => $activity->getSchedule(),
                ':employee_id' => $activity->getUserId(),
                ':id' => $activity->getId(),
            ]);
        }

        /**
         * @return $activities[]
         */
        public function getActivities(): array
        {
            $pdo = $this->prepareAndExecute('SELECT * FROM activities ORDER BY schedule ASC');
            $activities = [];
            foreach ($pdo->fetchAll() as $row) {
                $activity = new ActivityEntity();
                $activity->setName($row['name']);
                $activity->setSchedule($row['schedule']);
                $activities[] = $activity;
            }

            return $activities;
        }

        /**
         * @author aurel
         * @param int $id
         * @return $activity
        */
        public function getActivity(int $id): ?ActivityEntity
        {
            $pdo = $this->prepareAndExecute('SELECT * FROM activities WHERE id = ?', [
                $id
            ]);
            if (!$row = $pdo->fetch()) {
                return null;
            }
            $activity = new ActivityEntity();
            $activity->setName($row['name']);
            $activity->setDescription($row['description']);
            $activity->setSchedule($row['schedule']);
            return $activity;
        }

    }
