<?php

namespace App\ZoorificsAnimals\controllers;

use App\ZoorificsAnimals\models\breed\Breed;
use App\ZoorificsAnimals\models\Diet\Diet;
use App\ZoorificsAnimals\models\diet\DietEntity;
use App\ZoorificsAnimals\controllers\BreedController;
use App\ZoorificsAnimals\models\breed\BreedEntity;

class DietController extends BreedController
{
    // public function __construct()
    // {
    //     if($_SESSION['user'] && (in_array('MEDICAL_STAFF', $_SESSION['user']['role']) || in_array('ADMIN', $_SESSION['user']['role'])) ){
    //         $this->redirect('index.php?ctrl=home&action=connexion');   
    //     }
    // }

    /**
     * cette fonction sert à afficher les catégories d'animaux
     * @author aurel
    */
    public function index(): void
    { 

        $diets = new Diet();
        $diets->getDiets();
        $number = new BreedEntity();
        $breed = new Breed();
        $title = 'Liste des catégories d\'animaux';
        include(__DIR__ . '/../../views/diets/diets.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';

    }

    /**
     * cette fonction sert à modifier une catégorie d'animaux
     * @author aurel
    */
    public function edit(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=diet&action=index');
        }

        $dietRefactory = new Diet();
        $diet = $dietRefactory->getDiet($_GET['id']);

        if (null === $diet) {
            $this->redirect('index.php?ctrl=diet&action=index');
        }

        $errors = [];
        $post = array(
            "description" => $_POST['description'],
            "name" => $_POST['name']
        );
        $safe = array_map('trim', array_map('strip_tags', $post));
        if (
            isset($safe['description']) && !empty($safe['description'])
            && isset($safe['name']) && !empty($safe['name'])
        ){
            if (count($errors) === 0) {
                $diet = new DietEntity();
                $diet->setName($safe['name']);
                $diet->setDescription($safe['description']);
                $dietRefactory = new Diet();
                $dietRefactory->edit($diet);
                $this->redirect('index.php?ctrl=diet&action=index');
            }
        }else{
            $elements = ['name', 'description'];
            $errors = $this->validateForm($elements);
        }

        $name = $diet->getName();
        $description = $diet->getDescription();
        $color = $diet->getColor();
        $title = 'Modifier une catégorie d\'animaux';
        include(__DIR__ . '/../../views/diets/edit_diet.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }
}