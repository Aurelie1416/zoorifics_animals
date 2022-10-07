<?php

namespace App\ZoorificsAnimals\controllers;


use App\ZoorificsAnimals\controllers\AbstractController;
use App\ZoorificsAnimals\models\Breed\Breed;
use App\ZoorificsAnimals\models\diet\Diet;
use App\ZoorificsAnimals\models\animal\Animal;
use App\ZoorificsAnimals\models\animal\AnimalEntity;
use App\ZoorificsAnimals\models\breed\BreedEntity;

class BreedController extends AbstractController
{

    public function __construct()
    {
        // if($_SESSION['user'] && (in_array('ADMIN', $_SESSION['user']['role']) || in_array('MEDICAL_STAFF', $_SESSION['user']['role'])) ){
        //     $this->redirect('index.php?ctrl=home&action=connexion');   
        // }
    }

    /**
     * cette fonction sert à supprimer une espèce
     * @author aurel
    */
    public function delete(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=breed&action=index');
        }

        $breeds = new Breed();
        $animals = new Animal();

        $breed = $breeds->getBreed($_GET['id']);

        if (null !== $breed && count($animals->getAnimalsByBreed($_GET['id'])) == 0) {
            $breeds->delete($_GET['id']);
        }

        $this->redirect('index.php?ctrl=breed&action=index');
    }

    /**
     * cette fonction sert à afficher la liste des espèces
     * @author aurel
    */
    public function index(): void
    {

        $breeds = new Breed();
        $diets = new Diet();
        $animals = new AnimalEntity();
        $diet = $diets->getDiet($_GET['id']);
        if (isset($_GET['id'])) {
            $breeds->getBreedsByDiet($_GET['id']);
        }
        else{
            $breeds->getBreeds();
        }
        ob_start();
        $title = 'Espèces';
        include(__DIR__ . '/../../views/breeds/breeds.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à ajouter une espèce animal
     * @author aurel
    */
    public function create(): void
    {
        $dietsRefactory = new Diet();
        $diets = $dietsRefactory->getDiets();
        $errors = [];
        $post = array(
            "diet" => $_POST['diet'],
            "name" => $_POST['name'],
            "description" => $_POST['description']
        );
        $safe = array_map('trim', array_map('strip_tags', $post));
        if (
            isset($safe['diet']) && !empty($safe['diet'])
            && isset($safe['name']) && !empty($safe['name'])
            && isset($safe['description']) && !empty($safe['description'])
        ) {
            $elements = ['name' => 'nom', 'diet' => 'diet', 'description' => 'description'];
            $errors = $this->validateForm($elements);
            if (count($errors) === 0) {
                $breed = new BreedEntity();
                $breed->setName($safe['name']);
                $breed->setDietId($safe['diet']);
                $breed->setDescription($safe['description']);
                $breedRefactory = new Breed();
                $breedRefactory->createBreed($breed);
                $this->redirect('index.php?ctrl=breed&action=index');
            }
        }

        ob_start();
        $title = 'Ajouter une espèce';
        include(__DIR__ . '/../../views/breeds/add_breeds.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à modifier une espèce animal
     * @author aurel
    */
    public function edit(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=breed&action=index');
        }
        $dietsRefactory = new Diet();
        $diets = $dietsRefactory->getDiets();
        $breedRefactory = new Breed();
        $breed = $breedRefactory->getBreed($_GET['id']);

        if (null === $breed) {
            $this->redirect('index.php?ctrl=breed&action=index');
        }

        $errors = [];
        $post = array(
            "diet" => $_POST['diet'],
            "name" => $_POST['name'],
            "description" => $_POST['description']
        );
        $safe = array_map('trim', array_map('strip_tags', $post));
        if (
            isset($safe['diet']) && !empty($safe['diet'])
            && isset($safe['name']) && !empty($safe['name'])
            && isset($safe['description']) && !empty($safe['description'])
        ) {
            $elements = ['name' => 'nom', 'diet' => 'diet', 'description' => 'description'];
            $errors = $this->validateForm($elements);
            if (count($errors) === 0) {
                $breed = new BreedEntity();
                $breed->setName($safe['name']);
                $breed->setDietId($safe['diet']);
                $breed->setDescription($safe['description']);
                $breedRefactory = new Breed();
                $breedRefactory->edit($breed);
                $this->redirect('index.php?ctrl=breed&action=index');
            }
        }

        ob_start();
        $title = 'Ajouter une espèce';
        include(__DIR__ . '/../../views/breeds/edit_breeds.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';

        $name = $breed->getName();
        $description = $breed->getDescription();

    }
}
