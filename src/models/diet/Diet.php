<?php

namespace App\ZoorificsAnimals\models\diet;

use App\ZoorificsAnimals\models\Refactory;
use App\ZoorificsAnimals\models\diet\DietEntity;


    class Diet extends Refactory
    {
        /**
         * @author aurel
         * @param int $id
        */
        public function delete(int $id): void
        {
            $this->prepareAndExecute('DELETE FROM diets WHERE id=:id', [
                $id
            ]);
        }

        /**
         * @author aurel
         * @param class $diet
        */
        public function edit(DietEntity $diet): void
        {
            $this->prepareAndExecute('UPDATE diets SET name=:name, description=:description WHERE id=:id', [
                ':name' => $diet->getName(),
                ':description' => $diet->getDescription(),
                ':id' => $diet->getId()
            ]);
        }

        /**
         * @author aurel
         * @return $diets[]
        */
        public function getDiets(): array
        {
            $pdo = $this->prepareAndExecute('SELECT * FROM diets ORDER BY name ASC');
            $diets = [];
            foreach ($pdo->fetchAll() as $row) {
                $diet = new DietEntity();
                $diet->setName($row['name']);
                $diet->setColor($row['color']);
                $diet->setDescription($row['description']);
                $diets[] = $diet;
            }

            return $diets;
        }

        /**
         * @author aurel
         * @param int $id
         * @return $diet
        */
        public function getDiet(int $id): ?DietEntity
        {
            $this->prepareAndExecute('SELECT * FROM diets WHERE id = ?', [
                $id
            ]);
            $diet = new DietEntity();
            $diet->setName($_POST['name']);
            $diet->setColor($_POST['color']);
            $diet->setDescription($_POST['description']);
            return $diet;
        }

     }
