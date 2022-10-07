<?php

namespace App\ZoorificsAnimals\models\animal;

use App\ZoorificsAnimals\models\Refactory;
use App\ZoorificsAnimals\models\animal\AnimalEntity;


class Animal extends Refactory 
{
    /**
     * @author aurel
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->prepareAndExecute('DELETE FROM animals WHERE id=:id', [
            $id
        ]);
    }

    /**
     * @author aurel
     * @param int $breedId
     * @return int $pdo
    */
    public function getCountAnimalsByBreed($breedId)
    {
        $pdo = $this->prepareAndExecute('SELECT COUNT(*) FROM animals WHERE breed_id=?', [
            $breedId
        ]);

        return $pdo;
    }

    /**
     * @author aurel
     * @param class $animal
    */
    public function createAnimal(AnimalEntity $animal): void
    {
        $this->prepareAndExecute('INSERT INTO animals (name, breed_id, born_at, sexe, last_medical_check_at, next_medical_check_at, image, weight, medical_status VALUES(:name, :breed_id, :born_at, :sexe, :last_medical_check_at, :next_medical_check_at, :image, :weight, :medical_status)', [
            ':name' => $animal->getName(),
            ':breed_id' => $animal->getBreedId(),
            ':born_at' => $animal->getBornAt(),
            ':sexe' => $animal->getSexe(),
            ':last_medical_check_at' => $animal->getLastMedicalCheckAt(),
            ':next_medical_check_at' => $animal->getNextMedicalCheckAt(),
            ':medical_status' => $animal->getStatus(),
            ':weight' => $animal->getWeight(),
            ':image' => $animal->getImage(),
            ':medical_status' => $animal->getStatus()
        ]);
        $animal->setId($this->pdo->lastInsertId());
    }

    /**
     * @author aurel
     * @param class $animal
    */
    public function edit(AnimalEntity $animal): void
    {
        $this->prepareAndExecute('UPDATE animals SET name=:name, breed_id=:breed_id, born_at=:born_at, sexe=:=sexe, last_medical_check_at=:last_medical_check_at, next_medical_check_at=:next_medical_check_at, image=:image, weight=:weight, medical_status=:medical_status WHERE id=:id', [
            ':name' => $animal->getName(),
            ':breed_id' => $animal->getBreedId(),
            ':born_at' => $animal->getBornAt(),
            ':sexe' => $animal->getSexe(),
            ':last_medical_check_at' => $animal->getLastMedicalCheckAt(),
            ':next_medical_check_at' => $animal->getNextMedicalCheckAt(),
            ':medical_status' => $animal->getStatus(),
            ':weight' => $animal->getWeight(),
            ':image' => $animal->getImage(),
            ':medical_status' => $animal->getStatus(),
            ':id' => $animal->getId(),
        ]);
    }

    /**
     * @author aurel
     * @return $animals[]
    */
    public function getAnimals(): array
    {
        $pdo = $this->prepareAndExecute('SELECT * FROM animals ORDER BY name ASC');
        $animals = [];
        foreach ($pdo->fetchAll() as $row) {
            $animal = new AnimalEntity();
            $animal->setName($row['name']);
            $animal->setBreedId($row['breed']);
            $animal->setSexe($row['sexe']);
            $animal->setBornAt($row['birthdate']);
            $animal->setLastMedicalCheckAt($row['lastMedicalCheck']);
            $animal->setNextMedicalCheckAt($row['nextMedicalCheck']);
            $animal->setImage($row['image']);
            $animal->setWeight($row['weight']);
            $animal->setStatus($row['status']);
            $animals[] = $animal;
        }

        return $animals;
    }

    /**
     * @author aurel
     * @param int $breedId
     * @return $animals[]
    */
    public function getAnimalsByBreed($breedId): array
    {
        $pdo = $this->prepareAndExecute('SELECT * FROM animals WHERE breed_id = ? ORDER BY name ASC', [
            $breedId
        ]);
        $animals = [];
        foreach ($pdo->fetchAll() as $row) {
            $animal = new AnimalEntity();
            $animal->setName($row['name']);
            $animal->setBreedId($row['breed']);
            $animal->setSexe($row['sexe']);
            $animal->setBornAt($row['birthdate']);
            $animal->setLastMedicalCheckAt($row['lastMedicalCheck']);
            $animal->setNextMedicalCheckAt($row['nextMedicalCheck']);
            $animal->setImage($row['image']);
            $animal->setWeight($row['weight']);
            $animal->setStatus($row['status']);
            $animals[] = $animal;
        }

        return $animals;
    }

    /**
     * @author aurel
     * @param int $activityId
     * @return $animals[]
    */
    public function getAnimalsByActivity($activityId): array
    {
        $pdoAssossiation = $this->prepareAndExecute('SELECT * FROM activity_animals WHERE activity_id = ?', [
            $activityId
        ]);

        foreach ($pdoAssossiation->fetchAll() as $association) {
            $pdo = $this->prepareAndExecute('SELECT * FROM animals WHERE id = ?', [
                $association['animal_id']
            ]);
            $animals = [];
            foreach ($pdo->fetchAll() as $row) {
                $animal = new AnimalEntity();
                $animal->setName($row['name']);
                $animal->setBreedId($row['breed']);
                $animal->setSexe($row['sexe']);
                $animal->setBornAt($row['birthdate']);
                $animal->setLastMedicalCheckAt($row['lastMedicalCheck']);
                $animal->setNextMedicalCheckAt($row['nextMedicalCheck']);
                $animal->setImage($row['image']);
                $animal->setWeight($row['weight']);
                $animal->setStatus($row['status']);
                $animals[] = $animal;
            }
        }

        return $animals;
    }

    /**
     * @author aurel
     * @param int $id
     * @return $animal
    */
    public function getAnimal(int $id): ?AnimalEntity
    {
        $this->prepareAndExecute('SELECT * FROM animals WHERE id = ?', [
            $id
        ]);
        $animal = new AnimalEntity();
        $animal->getName($_POST['name']);
        $animal->getBreedId($_POST['breed']);
        $animal->getSexe($_POST['sexe']);
        $animal->getBornAt($_POST['birthdate']);
        $animal->getLastMedicalCheckAt($_POST['lastMedicalCheck']);
        $animal->getNextMedicalCheckAt($_POST['nextMedicalCheck']);
        $animal->getImage($_FILES['image']);
        $animal->getWeight($_POST['weight']);
        $animal->getStatus($_POST['status']);
        return $animal;
    }
}
