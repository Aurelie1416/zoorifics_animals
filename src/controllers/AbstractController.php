<?php

    namespace App\ZoorificsAnimals\controllers;
    require __DIR__ . '/../../vendor/autoload.php';
    abstract class AbstractController
    {

        public function __construct()
        {
            $_SESSION['user']['role'] = 'ADMIN';
            $_SESSION['user']['id'] = '1';
            define('URL', 'http://localhost/zoorifics_animals/');

        }

        /**
         * cette fonction sert à faire une redirection'
         * @author aurel
         * @param string $location
         * @param int $status
        */
        protected function redirect(string $location, int $status = 302): void
        {
            header('Location: ' . $location, true, $status);
            die;
        }

         /**
         * cette fonction sert à valider si les champs d'un formulaire sont remplis
         * @author aurel
         * @param array $elements
        */
        protected function validateForm($elements): array
        {
            $errors = [];
            foreach($elements as $element){
                if (empty($_POST[$element])) {
                    $errors[] = 'Veuillez remplir le champs '.$element;
                }
        
            }
    
            return $errors;
        }
    }