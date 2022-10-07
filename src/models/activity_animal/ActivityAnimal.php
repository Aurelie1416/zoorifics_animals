<?php

namespace App\ZoorificsAnimals\models\activity_animal;

use App\ZoorificsAnimals\models\Refactory;
use App\ZoorificsAnimals\models\activity_animal\ActivityAnimalEntity;


    class ActivityAnimal extends Refactory
    {
       /**
         * @author aurel
         * @param int $activityId
         * @return $association[]
        */
        public function getAssosciationByActivity($activityId){
            $pdo = $this->prepareAndExecute('SELECT * FROM activity_animal WHERE activity_id = ?', [
                $activityId
            ]);
                $associations = [];
                foreach ($pdo->fetchAll() as $row) {
                    $association = new ActivityAnimalEntity();
                    $association->getActivityId($row['activity_id']);
                    $association->getAnimalId($row['animal_id']);
                    $associations[] = $association;
                }
    
            return $associations;
        }
        
        /**
         * @author aurel
         * @param class $activityAnimal
        */
        public function createActivityAnimal(ActivityAnimalEntity $activityAnimal): void
        {
            $this->prepareAndExecute('INSERT INTO activit_animal (animal_id) VALUES(":animal_id")', [
                ':animal_id' => $activityAnimal->getAnimalId()
            ]);
            $activityAnimal->setActivityId($this->pdo->lastInsertId());

        }

        /**
         * @author aurel
         * @param class $activityAnimal
        */
        public function editActivityAnimal(ActivityAnimalEntity $activityAnimal): void
        {
            $this->prepareAndExecute('UPDATE activit_animal SET activity_id=:activity_id, animal_id=:animal_id', [
                ':activity_id' => $activityAnimal->getActivityId(),
                ':animal_id' => $activityAnimal->getAnimalId()
            ]);
        }

    }
