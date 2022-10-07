<?php

namespace App\ZoorificsAnimals\models\breed;

use App\ZoorificsAnimals\models\Refactory;
use App\ZoorificsAnimals\models\breed\BreedEntity;


class Breed extends Refactory
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
     * @param class $breed
    */
    public function createBreed(BreedEntity $breed): void
    {
        $this->prepareAndExecute('INSERT INTO breeds (name, diet_id, description VALUES(:name, :diet_id, :description)', [
            ':name' => $breed->getName(),
            ':diet_id' => $breed->getDietId(),
            ':description' => $breed->getDescription()
        ]);
        $breed->setId($this->pdo->lastInsertId());
    }

    /**
     * @author aurel
     * @param class $Idbreed
     * @return $animal
    */
    public function edit(BreedEntity $breed): void
    {
        $this->prepareAndExecute('UPDATE breeds SET name=:name, diet_id=:diet_id, description=:description WHERE id=:id', [
            ':name' => $breed->getName(),
            ':diet_id' => $breed->getDietId(),
            ':desription' => $breed->getDescription(),
            ':id' => $breed->getId()
        ]);
    }

    /**
     * @author aurel
     * @return $breeds[]
    */
    public function getBreeds(): array
    {
        $pdo = $this->prepareAndExecute('SELECT * FROM breeds ORDER BY name, name ASC');
        $breeds = [];
        foreach ($pdo->fetchAll() as $row) {
            $breed = new BreedEntity();
            $breed->setName($row['name']);
            $breed->setDietId($row['diet']);
            $breed->setDescription($row['description']);
            $breeds[] = $breed;
        }

        return $breeds;
    }

    /**
     * @author aurel
     * @param int $dietId
     * @return $animalbreeds[]
    */
    public function getBreedsByDiet($dietId): array
    {
        $pdo = $this->prepareAndExecute('SELECT * FROM breeds WHERE diet_id = ? ORDER BY name, name ASC', [
            $dietId
        ]);
        $breeds = [];
        foreach ($pdo->fetchAll() as $row) {
            $breed = new BreedEntity();
            $breed->setName($row['name']);
            $breed->setDietId($row['diet']);
            $breed->setDescription($row['description']);
            $breeds[] = $breed;
        }

        return $breeds;
    }

    /**
     * @author aurel
     * @param int $dietId
     * @return int $pdo
    */
    public function getCountBreedsByDiet($dietId)
    {
        $pdo = $this->prepareAndExecute('SELECT COUNT(*) FROM breeds WHERE diet_id=?', [
            $dietId
        ]);

        return $pdo;
    }

    /**
     * @author aurel
     * @param int $id
     * @return $breed
    */
    public function getBreed(int $id): ?BreedEntity
    {
        $this->prepareAndExecute('SELECT * FROM breeds WHERE id = ?', [
            $id
        ]);
        $breed = new BreedEntity();
        $breed->getName();
        $breed->getDietId();
        $breed->getDescription();
        return $breed;
    }
}
