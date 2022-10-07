<?php

namespace App\ZoorificsAnimals\controllers;

use App\ZoorificsAnimals\controllers\AbstractController;
use App\ZoorificsAnimals\Models\Job\Job;
use App\ZoorificsAnimals\models\job\JobEntity;

class JobController extends AbstractController
{
    // public function __construct()
    // {
    //     if($_SESSION['user'] && (in_array('ADMIN', $_SESSION['user']['role']) || in_array('RH_STAFF', $_SESSION['user']['role'])) ){
    //         $this->redirect('index.php?ctrl=home&action=connexion');   
    //     }
    // }

    /**
     * cette fonction sert à afficher les postes
     * @author aurel
    */
    public function index(): void
    { 
        //require_once(__DIR__ . '/../models/job/Job.php');
        $jobsRefactory = new Job();
        $jobs = $jobsRefactory->getJobs();
        ob_start();
        $title = 'Liste des postes';
        include(__DIR__ . '/../../views/jobs/jobs.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';

    }

    /**
     * cette fonction sert à créer un nouveau poste
     * @author aurel
    */
    public function create(): void
    {
        $errors = [];
        // $safe = array_map('trim', array_map('strip_tags', $_POST['post']));
        if (
            isset($_POST['post']) && !empty($_POST['post'])
            && isset($_POST['role']) && !empty($_POST['role'])
        ){
            if (count($errors) === 0) {
                $job = new JobEntity();
                $job->setRole($_POST['role']);
                $job->setPost($_POST['post']);
                $jobRefactory = new Job();
                $jobRefactory->createJob($job);
                $this->redirect('index.php?ctrl=job&action=index');
            }
        }
        else{
            $elements = ['role', 'post'];
            $errors = $this->validateForm($elements);
        }

        $title = 'Créer un poste';
        include(__DIR__ . '/../../views/jobs/add_job.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert à modifier un poste
     * @author aurel
    */
    public function edit(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=job&action=index');
        }

        $jobRefactory = new Job();
        $job = $jobRefactory->getJobs($_GET['id']);

        if (null === $job) {
            $this->redirect('index.php?ctrl=job&action=index');
        }

        $errors = [];
        $safe = array_map('trim', array_map('strip_tags', $_POST['post']));
        if (
            isset($safe['post']) && !empty($safe['post'])
            && isset($_POST['role']) && !empty($_POST['role'])
        ){
            if (count($errors) === 0) {
                $job = new JobEntity();
                $job->setPost($safe['post']);
                $job->setRole($_POST['role']);
                $jobRefactory = new Job();
                $jobRefactory->editJob($job);
                $this->redirect('index.php?ctrl=job&action=index');
            }
        }
        else{
            $elements = ['role', 'post'];
            $errors = $this->validateForm($elements);
        }

        $title = 'Modifier un poste';
        include(__DIR__ . '/../../views/jobs/edit_job.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    public function delete(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=job&action=index');
        }

        $jobs = new Job();
        $job = $jobs->getJob($_GET['id']);

        if (null !== $job) {
            $jobs->delete($_GET['id']);
        }

        $this->redirect('index.php?ctrl=job&action=index');
    }
}