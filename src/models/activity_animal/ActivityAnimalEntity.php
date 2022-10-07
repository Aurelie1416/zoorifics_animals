<?php
namespace App\ZoorificsAnimals\models\activity_animal;

class ActivityAnimalEntity
    {
        /** @var int|null */
        protected $activityId;

        /** @var int|null */
        protected $animalId;

        /**
         * @return int|null
         */
        public function getActivityId(): ?int
        {
            return $this->activity_id;
        }

        /**
         * @param int|null $activityId
         */
        public function setActivityId(?int $activityId): void
        {
            $this->activity_id = $activityId;
        }

        /**
         * @return int|null
         */
        public function getAnimalId(): ?int
        {
            return $this->animal_id;
        }

        /**
         * @param int|null $idanimalId
         */
        public function setAnimalId(?int $animalId): void
        {
            $this->animal_id = $animalId;
        }
    }