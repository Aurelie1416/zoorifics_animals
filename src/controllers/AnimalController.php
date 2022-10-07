<?php

namespace App\ZoorificsAnimals\controllers;

use App\ZoorificsAnimals\controllers\AbstractController;
use App\ZoorificsAnimals\models\breed\Breed;
use App\ZoorificsAnimals\models\diet\Diet;
use App\ZoorificsAnimals\models\Animal\Animal;
use App\ZoorificsAnimals\models\animal\AnimalEntity;

class AnimalController extends AbstractController
{
    public function __construct()
    {
        // if($_SESSION['user'] && (in_array('ADMIN', $_SESSION['user']['role']) || in_array('MEDICAL_STAFF', $_SESSION['user']['role'])) ){
        //     $this->redirect('index.php?ctrl=home&action=connexion');   
        // }
    }
    
    /**
     * cette fonction sert à afficher la liste des animaux par espèce
     * @author aurel
    */
    public function index(): void
    { 
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=animal&action=index');
        }

        $animals = new Animal();
        $breeds = new Breed();
        $diets = new Diet();
        $breed = $breeds->getBreed($_GET['id']); 
        $diet = $diets->getDiet($breed->getDietId());
        $animals->getAnimalsByBreed($_GET['id']);
        ob_start();
        $title = 'Liste des animaux';
        include(__DIR__ . '/../../views/animals/animals.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';

    }

    /**
     * cette fonction sert à afficher la fiche d'un animal
     * @author aurel
    */
    public function display(){
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=animal&action=index');
        }

        $animalRefactory = new Animal();
        $animal = $animalRefactory->getAnimal($_GET['id']);
        $breeds = new Breed();

        if (null === $animal) {
            $this->redirect('index.php?ctrl=animal&action=index');
        }
        $name = $animal->getName();
        $breed = $animal->getBreedId();
        if($animal->getSexe() == true){
            $sexe = '♂';
        }
        else{
            $sexe = '♀';
        }
        $breed = $breeds->getBreed($animal->getBreedId()); 
        $birthdate = $animal->getBornAt();
        $lastMedicalCheck = $animal->getLastMedicalCheckAt();
        $nextMedicalCheck = $animal->getNextMedicalCheckAt();
        $image = $animal->getImage();
        $weight = $animal->getWeight();
        $status = $animal->getStatus();
        ob_start();
        $title = 'Animal';
        include(__DIR__ . '/../../views/animals/animal.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à créer un nouvel animal
     * @author aurel
    */
    public function create(): void
    {
        $breedsRefactory = new Breed();
        $breeds = $breedsRefactory->getBreeds();

        $errors = [];
        $post = array(
            "breed" => $_POST['breed'],
            "name" => $_POST['name'],
            "birthdate" => $_POST['birthdate'],
            "sexe" => $_POST['sexe'],
            "lastMedicalCheck" => $_POST['lastMedicalCheck'],
            "nextMedicalCheck" => $_POST['nextMedicalCheck'],
            "weight" => $_POST['weight'],
            "status" => $_POST['status']
        );
        $safe = array_map('trim', array_map('strip_tags', $post));
        if (
            isset($safe['sexe']) && !empty($safe['sexe'])
            && isset($safe['name']) && !empty($safe['name'])
            && isset($safe['breed']) && !empty($safe['breed'])
            && isset($safe['birthdate']) && !empty($safe['birthdate'])
            && isset($safe['weight']) && !empty($safe['weight'])
        ){
            if(isset($_FILES['image']) && !empty($_FILES['image'])){
                if ($_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {

                    if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
                        $errors[] = "Une erreur est survenue lors du transfert de l'image";
                    }
                    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $nameImage = htmlspecialchars($safe['lastName']) . 'image' . time() . '.' . $extension;
                    $tabExtension = ['png', 'jpeg', 'jpg'];
                    $type = ['image/png', 'image/jpeg', 'image/jpg'];
                    if (!in_array(strtolower($extension), $tabExtension) || !in_array($_FILES['image']['type'], $type)) {
                        $errors[] = "Le type de l'image est incorrecte. Seule les images au format PNG ou JPEG ou JPG sont autorisées";
                    }
                    $taillemax = 1048576;
                    if ($_FILES['image']['size'] > $taillemax) {
                        $errors[] = "Votre image est trop lourde (1Mo maximum)";
                    }
                    if (!move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/public/image/' . $nameImage)) {
                        $errors[] = "L'image n'a pas été transférée";
                    }
                }
            }
            if (count($errors) === 0) {
                $animal = new AnimalEntity();
                $animal->setName($safe['name']);
                $animal->setBreedId($safe['breed']);
                $animal->setBornAt($safe['birthdate']);
                $animal->setSexe($safe['sexe']);
                $animal->setWeight($safe['weight']);
                $animal->setStatus($safe['status']);

                if(isset($_FILES['image']) && !empty($_FILES['image'])){
                    $animal->setImage($safe['image']);
                }
                else{
                    $animal->setImage(null);
                }
                if(isset($safe['lastMedicalCheck']) && !empty($safe['lastMedicalCheck'])){
                    $animal->setLastMedicalCheckAt($safe['lastMedicalCheck']);
                }
                else{
                    $animal->setLastMedicalCheckAt(date('d/m/Y'));
                }
                if(isset($safe['nextMedicalCheck']) && !empty($safe['nextMedicalCheck'])){
                    $animal->setNextMedicalCheckAt($safe['nextMedicalCheck']);
                }
                else{
                    $animal->setNextMedicalCheckAt(date("d/m/Y", strtotime('+1 month', date("d/m/Y"))));
                }
                $animalRefactory = new Animal();
                $animalRefactory->createAnimal($animal);
                $this->redirect('index.php?ctrl=animal&action=index');
            }
            else{
                $elements = ['name', 'sexe', 'breed', 'birthdate', 'weight'];
                $errors = $this->validateForm($elements);
            }
        }

        ob_start();
        $title = 'Animal';
        include(__DIR__ . '/../../views/animals/add_animal.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à modifier les informations d'un animal
     * @author aurel
    */
    public function edit(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=animal&action=index');
        }

        $animalRefactory = new Animal();
        $animal = $animalRefactory->getAnimal($_GET['id']);

        if (null === $animal) {
            $this->redirect('index.php?ctrl=animal&action=index');
        }

        $errors = [];
        $post = array(
            "breed" => $_POST['breed'],
            "name" => $_POST['name'],
            "birthdate" => $_POST['birthdate'],
            "sexe" => $_POST['sexe'],
            "lastMedicalCheck" => $_POST['lastMedicalCheck'],
            "nextMedicalCheck" => $_POST['nextMedicalCheck'],
            "weight" => $_POST['weight'],
            "status" => $_POST['status']
        );
        $safe = array_map('trim', array_map('strip_tags', $post));
        if (
            isset($safe['sexe']) && !empty($safe['sexe'])
            && isset($safe['name']) && !empty($safe['name'])
            && isset($safe['breed']) && !empty($safe['breed'])
            && isset($safe['birthdate']) && !empty($safe['birthdate'])
            && isset($safe['weight']) && !empty($safe['weight'])
        ){
            if(isset($_FILES['image']) && !empty($_FILES['image'])){
                if ($_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {

                    if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
                        $errors[] = "Une erreur est survenue lors du transfert de l'image";
                    }
                    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $nameImage = htmlspecialchars($safe['lastName']) . 'image' . time() . '.' . $extension;
                    $tabExtension = ['png', 'jpeg', 'jpg'];
                    $type = ['image/png', 'image/jpeg', 'image/jpg'];
                    if (!in_array(strtolower($extension), $tabExtension) || !in_array($_FILES['image']['type'], $type)) {
                        $errors[] = "Le type de l'image est incorrecte. Seule les images au format PNG ou JPEG ou JPG sont autorisées";
                    }
                    $taillemax = 1048576;
                    if ($_FILES['image']['size'] > $taillemax) {
                        $errors[] = "Votre image est trop lourde (1Mo maximum)";
                    }
                    if (!move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/public/image/' . $nameImage)) {
                        $errors[] = "L'image n'a pas été transférée";
                    }
                }
            }
            if (count($errors) === 0) {
                $animal = new AnimalEntity();
                $animal->setName($safe['name']);
                $animal->setBreedId($safe['breed']);
                $animal->setBornAt($safe['birthdate']);
                $animal->setSexe($safe['sexe']);
                $animal->setWeight($safe['weight']);
                if(isset($safe['status']) && !empty($safe['status'])){
                    $animal->setStatus($safe['status']);
                }
                else{
                    $animal->setStatus(null);
                }
                if(isset($_FILES['image']) && !empty($_FILES['image'])){
                    $animal->setImage($safe['image']);
                }
                else{
                    $animal->setImage(null);
                }
                $animal->setLastMedicalCheckAt($safe['lastMedicalCheck']);
                $animal->setNextMedicalCheckAt($safe['nextMedicalCheck']);
                $animalRefactory = new Animal();
                $animalRefactory->edit($animal);
                $this->redirect('index.php?ctrl=animal&action=index');
            }
            else{
                $elements = ['name', 'sexe', 'breed', 'birthdate', 'weight'];
                $errors = $this->validateForm($elements);
            }
        }

        $name = $animal->getName();
        $breed = $animal->getBreedId();
        $sexe = $animal->getSexe();
        $birthdate = $animal->getBornAt();
        $lastMedicalCheck = $animal->getLastMedicalCheckAt();
        $nextMedicalCheck = $animal->getNextMedicalCheckAt();
        $image = $animal->getImage();
        $weight = $animal->getWeight();
        $status = $animal->getStatus();

        ob_start();
        $title = 'Animal';
        include(__DIR__ . '/../../views/animals/edit_animal.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à supprimer un animal
     * @author aurel
    */
    public function delete(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=animal&action=index');
        }

        $animals = new Animal();
        $animal = $animals->getAnimal($_GET['id']);

        if (null !== $animal) {
            $animals->delete($_GET['id']);
        }

        $this->redirect('index.php?ctrl=animal&action=index');
    }
}
