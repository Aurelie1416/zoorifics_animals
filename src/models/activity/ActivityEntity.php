<?php
namespace App\ZoorificsAnimals\models\activity;

class ActivityEntity
    {
        /** @var int|null */
        protected $id;

        /** @var string|null */
        protected $name;

        /** @var string|null */
        protected $description;        


        /** @var string|null */
        protected $schedule;  

        /** @var int|null */
        protected $userId;  

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
        public function getUserId(): ?int
        {
            return $this->user_id;
        }

        /**
         * @param int|null $userId
         */
        public function setUserId(?int $userId): void
        {
            $this->user_id = $userId;
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
        
        /**
         * @return string|null
         */
        public function getSchedule(): ?string
        {
            return $this->schedule;
        }

        /**
         * @param string|null $schedule
         */
        public function setSchedule(?string $schedule): void
        {
            $this->schedule = $schedule;
        }
    }