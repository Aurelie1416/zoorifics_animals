<?php

namespace App\ZoorificsAnimals\controllers;

use App\ZoorificsAnimals\controllers\AbstractController;
use App\ZoorificsAnimals\models\activity\Activity;
use App\ZoorificsAnimals\models\activity\ActivityEntity;
use App\ZoorificsAnimals\models\animal\Animal;
use App\ZoorificsAnimals\models\activity_animal\ActivityAnimal;
use App\ZoorificsAnimals\models\activity_animal\ActivityAnimalEntity;
use App\ZoorificsAnimals\models\user\User;

class ActivityController extends AbstractController
{
    // public function __construct()
    // {
    //     if($_SESSION['user'] && (in_array('ADMIN', $_SESSION['user']['role']) || in_array('MEDICAL_STAFF', $_SESSION['user']['role'])) ){
    //         $this->redirect('index.php?ctrl=home&action=connexion');   
    //     }
    // }
    
    /**
     * cette fonction sert à afficher la liste des activités
     * @author aurel
    */
    public function index(): void
    {

        $activities = new Activity();
        $activities->getActivities();
        ob_start();
        $title = 'Liste des Activités';
        include(__DIR__ . '/../../views/activities/activities.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';

    }

    /**
     * cette fonction sert à afficher le détail d'une activité
     * @author aurel
    */
    public function display(){
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=activity&action=index');
        }

        $activityRefactory = new Activity();
        $animalsByActivity = new Animal();
        $animator = new User();
        $animalsByActivity->getAnimalsByActivity($_GET['id']);
        $activity = $activityRefactory->getActivity($_GET['id']);
        $animator->getUser($activity->getUserId());

        if (null === $activity) {
            $this->redirect('index.php?ctrl=activity&action=index');
        }
        $name = $activity->getName();
        $description = $activity->getDescription();
        $schedule = $activity->getSchedule();
        ob_start();
        $title = 'Activité';
        include(__DIR__ . '/../../views/activities/activity.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à créer une activité
     * @author aurel
    */
    public function create(): void
    {
        $animals = new Animal();
        $animator = new User();
        
        $animals->getAnimals();
        $animator->getUsersAnimator();
        $errors = [];
        $post = array(
            "description" => $_POST['description'],
            "name" => $_POST['name'],
            "schedule" => $_POST['schedule'],
            "animator" => $_POST['animator'],
        );
        $safe = array_map('trim', array_map('strip_tags', $post));
        if (
            isset($safe['description']) && !empty($safe['description'])
            && isset($safe['name']) && !empty($safe['name'])
            && isset($safe['schedule']) && !empty($safe['schedule'])
            && isset($safe['animator']) && !empty($safe['animator'])
            && isset($_POST['animals']) && !empty($_POST['animals'])
        ){
            if (count($errors) === 0) {
                $activity = new ActivityEntity();
                $activityAnimal = new ActivityAnimalEntity();
                $activity->setName($_POST['name']);
                $activity->setDescription($_POST['description']);
                $activity->setSchedule($_POST['schedule']);
                $activity->setUserId($_POST['animator']);
                foreach($_POST['animals'] as $animal){
                    $activityAnimal->setAnimalId($animal);
                    $activityAnimalRefactory = new ActivityAnimal();
                    $activityAnimalRefactory->createActivityAnimal($activityAnimal);
                }
                $activityRefactory = new Activity();
                $activityRefactory->createActivity($activity);
                $this->redirect('index.php?ctrl=activity&action=index');
            }
        }
        else{
            $elements = ['name', 'schedule', 'animator', 'description', 'animals'];
            $errors = $this->validateForm($elements);
        }

        ob_start();
        $title = 'Création Activité';
        include(__DIR__ . '/../../views/activities/add_activity.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à modifier une activité
     * @author aurel
    */
    public function edit(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=activity&action=index');
        }

        $activityRefactory = new Activity();
        $activity = $activityRefactory->getActivity($_GET['id']);
        $user = new User();
        $animalsRefactory = new Animal();
        $animals = $animalsRefactory->getAnimals();
        $activityAnimal = new ActivityAnimal();

        if (null === $activity) {
            $this->redirect('index.php?ctrl=activity&action=index');
        }

        $errors = [];

        $post = array(
            "description" => $_POST['description'],
            "name" => $_POST['name'],
            "schedule" => $_POST['schedule'],
            "animator" => $_POST['animator'],
        );
        $safe = array_map('trim', array_map('strip_tags', $post));
        if (
            isset($safe['description']) && !empty($safe['description'])
            && isset($safe['name']) && !empty($safe['name'])
            && isset($safe['schedule']) && !empty($safe['schedule'])
            && isset($safe['animator']) && !empty($safe['animator'])
            && isset($_POST['animals']) && !empty($_POST['animals'])
        ){
            if (count($errors) === 0) {
                $activity = new ActivityEntity();
                $activityAnimal = new ActivityAnimalEntity();
                $activity->setName($_POST['name']);
                $activity->setDescription($_POST['description']);
                $activity->setSchedule($_POST['schedule']);
                $activity->setUserId($_POST['animator']);
                foreach($_POST['animals'] as $animal){
                    $activityAnimal->setAnimalId($animal);
                    $activityAnimalRefactory = new ActivityAnimal();
                    $activityAnimalRefactory->editActivityAnimal($activityAnimal);
                }
                $activityRefactory = new Activity();
                $activityRefactory->editActivity($activity);
                $this->redirect('index.php?ctrl=activity&action=index');
               }   
        }else{
            $elements = ['name', 'schedule', 'animator', 'description', 'animals'];
            $errors = $this->validateForm($elements);
        }

        $name = $activity->getName();
        $description = $activity->getDescription();
        $schedule = $activity->getSchedule();
        $animator = $user->getUser($activity->getUserId());
        $animalsSelected = [];
        $asssosiationActivityAnimal = $activityAnimal->getAssosciationByActivity($_GET['id']);
        foreach($asssosiationActivityAnimal as $association){
            $animalsSelected = $animalsRefactory->getAnimal($association->getAnimalId());
        }
        ob_start();
        $title = 'Modification Activité';
        include(__DIR__ . '/../../views/activities/edit_activity.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à effacer une activité
     * @author aurel
    */
    public function delete(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=activity&action=index');
        }

        $activities = new Activity();
        $activity = $activities->getActivity($_GET['id']);

        if (null !== $activity) {
            $activities->delete($activity->getId());
        }

        $this->redirect('index.php?ctrl=activity&action=index');
    }
}
