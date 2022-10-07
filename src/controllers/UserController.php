<?php

namespace App\ZoorificsAnimals\controllers;

use App\ZoorificsAnimals\controllers\JobController;
use App\ZoorificsAnimals\models\job\Job;
use App\ZoorificsAnimals\models\User\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends JobController
{

    // public function __construct()
    // {
    //     if($_SESSION['user'] ){
    //         $this->redirect('index.php?ctrl=home&action=connexion');   
    //     }
    // }

    /**
     * cette fonction sert à se connecter
     * @author aurel
    */
    public function connexion()
    {
        $errors = [];
        if (!empty($_POST)) {
            $safe = array_map('trim', array_map('strip_tags', $_POST));
            if (
                isset($safe['email']) && !empty($safe['email'])
                && isset($safe['password']) && !empty($safe['password'])
            ) {
                if (!filter_var($safe['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Votre email n'est pas valide";
                } else {

                    $email = $safe['email'];
                }
                $userRefactory = new User();

                $user = $userRefactory->getUser($email);

                $password = $safe['password'];
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'first_name' => $user['first_name'],
                        'role' => $user['role'],
                        'last_name' => $user['last_name'],
                    ];
                    $this->redirect('index.php?ctrl=user&action=index');

                } else {
                    $errors[] = "Votre email et/ou mot de passe n'est pas valide";
                }
            } else {
                $errors[] = "Votre email et/ou mot de passe n'est pas valide";
            }
        }
        ob_start();
        $title = 'connexion';
        include(__DIR__ . '/../../views/connexion.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';
    }

    /**
     * cette fonction sert se déconnecter
     * @author aurel
    */
    public function deconnexion(){
        unset($_SESSION['user']);
        $this->redirect('index.php?ctrl=home&action=connexion');

    }
    
    /**
     * cette fonction sert à afficher la liste des employés
     * @author aurel
    */
    public function index(): void
    {
        $jobId = null;
        if (isset($_GET['id'])) {
            $jobId = $_GET['id'];
            $job = new Job;
            $post = $job->getJob($jobId);
        }
        $job = new Job;
        $users = new User();
        $users->getUsers($jobId);
        ob_start();
        $title = 'Employés';
        include(__DIR__ . '/../../views/users/users.php');
        $content = ob_get_clean();
    }

    /**
     * cette fonction sert à afficher le compte d'un employé
     * @author aurel
    */
    public function display()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=user&action=index');
        }

        $userRefactory = new User();
        $user = $userRefactory->getUser($_GET['id']);

        if (null === $user) {
            $this->redirect('index.php?ctrl=user&action=index');
        }
        $jobId = $_GET['id'];
        $job = new Job;
        $post = $job->getJob($_POST['job_id']);
        $firstname = $user->getFirstname($_POST['firstname']);
        $lastname = $user->getLastname($_POST['lastname']);
        $hiredAt = $user->getHiredAt($_POST['hiredAt']);
        $email = $user->getEmail($_POST['email']);
        $phone = $user->getPhone($_POST['phone']);
        ob_start();
        $title = 'Compte employé';
        include(__DIR__ . '/../../views/users/user.php');
        $content = ob_get_clean();
    }

    /**
     * cette fonction sert à réinitialiser son mot de passe
     * @author aurel
    */
    public function resetPassword(): void
    {
        $errors = [];
        $userRefactory = new User();
        $user = $userRefactory->getUser($_GET['token']);
        if ($user) {

            $datenow = date('Y-m-d H:i:s');
            $expiration = $user->getDateTokenAt();

            if ($datenow >= $expiration) {
                $errors = "Ce lien a expiré";
                $user->setDateTokenAt(null);
                $userRefactory->edit($user);

                $this->redirect('index.php?ctrl=home&action=connexion');
            } else {

                if (!empty($_POST)) {
                    $safe = array_map('trim', array_map('strip_tags', $_POST));
                    if(isset($safe['password1']) && !empty($safe['password1'])
                    && isset($safe['password2']) && !empty($safe['password2'])){
                        if (strlen($safe['password1']) < 8) {
                            $errors[] = 'Votre mot de passe doit comporter au moins 8 caracteres';
                        }
    
                        if (!preg_match('#(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_\W]).*$#', $safe['password1'])) {
                            $errors[] = 'Votre mot de passe doit comporter au moins une majuscule, un chiffre et un caractère spécial';
                        }
    
                        if ($safe['password1'] !== $safe['password2']) {
                            $errors[] = 'Mots de passes non identiques';
                        }
                        if (count($errors) === 0) {
    
                            $user->setPassword($this->passwordEncoder->encodePassword($user, $safe['password1']));
                            $user->setDateTokenAt(null);
                            $user->setToken(null);
                            $userRefactory = new User();
                            $userRefactory->edit($user);
                            $this->connexion();
                        }
                    }
                    else{
                        $elements = ['password1', 'password2'];
                        $errors = $this->validateForm($elements);
                    }
                    
                }
            }
        }
        ob_start();
        $title = 'Réinitialisation mot de passe';
        include(__DIR__ . '/../../views/users/edit_password.php');
        $content = ob_get_clean();
    }

    /**
     * cette fonction sert à envoyer par mail un lien de réinitialisation de mot de passe
     * @author aurel
    */
    public function forgetPassword(): void
    {
        $safe = array_map('trim', array_map('strip_tags', $_POST));
        $errors = [];

        if (!empty($_POST) && isset($safe['email']) && !empty($safe['email'])) {

            if (!filter_var($safe['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Veuillez rentrer un email valide';
            }

            if (count($errors) === 0) {
                $userRefactory = new User();

                $user = $userRefactory->getUserByEmail($_GET['email']);

                if (!$user) {
                    // l'utilisateur n'a pas été trouvé
                    echo 'success', 'si le compte concerné existe, un email vous sera envoyé';
                    $this->redirect('index.php?ctrl=home&action=connexion');
                } else {

                    $token = md5(uniqid());
                    $token = bin2hex(random_bytes(10));
                    $expirationDate = date('Y-m-d H:i:s', strtotime("+1 hour"));

                    $user->setDateTokenAt($expirationDate);
                    $user->setToken($token);
                    $userRefactory->edit($user);
                    $contentEmail = '<p>Bonjour, </p>';
                    $contentEmail .= '<br>Une demande de réinitialisation de mot de passe a été effectué sur Anim\'Agé à ' . date('H') . 'h' . date('i') . ' : </br>';
                    $contentEmail .= '<br>Si vous n\'êtes pas à l\'origine de cette demande, veuillez ignorer ce message.</br>';
                    $contentEmail .= '<br>Dans le cas contraire, veuillez cliquer sur le lien ci-dessous</br>';
                    $contentEmail .= "<a href='http://localhost/zoorifics_animals/index.php?ctrl=user&token={$token}'>zoorificsanimals/reinitialisation-mot-de-passe</a>";
                    $contentEmail .= '<br>Ce lien expirera d\'ici une heure</br>';
                    $contentEmail .= '<br>Toute l\'équipe de Zoorifics Animals vous souhaite de passer une agréable fin de journée</br>';
                    $contentEmail .= '<hr>';
                    $contentEmail .= '<small>Cet email est un message automatique. Merci de ne pas y répondre</small>';

                    $sendmail = new PHPMailer(true);
                    $sendmail->isSMTP();
                    $sendmail->Host = 'localhost';
                    $sendmail->Port = 1025;
                    $sendmail->SMTPAutoTLS = false;
                    try {
                        $sendmail->setfrom('zoorifics.animals@gmail.com');
                        $sendmail->addAddress($safe['email']);
                        $sendmail->Subject = 'mot de passe oublié';
                        $sendmail->Body = (strip_tags($contentEmail));
                        $sendmail->send();
                        echo "email envoyé";
                    } catch (Exception $error) {
                        echo "il y a eu une erreur lors de l'envoi de votre email : {$sendmail->ErrorInfo}";
                    }
                    $this->redirect('index.php?ctrl=home&action=connexion');
                }
            }
        }
        else{
            $elements = ['email'];
            $errors = $this->validateForm($elements);
        }

        ob_start();
        $title = 'Mot de passe oublié';
        include(__DIR__ . '/../../views/users/password_forget.php');
        $content = ob_get_clean();
    }

    /**
     * cette fonction sert à ajouter un nouvel employé
     * @author aurel
    */
    public function create(): void
    {
        $userRefactory = new User();
        $user = $userRefactory->getUser($_GET['id']);
        $jobRefactory = new Job;
        $jobs = $jobRefactory->getJobs();

        if (null === $user) {
            $this->redirect('index.php?ctrl=user&action=index');
        }
        if (!empty($_POST)) {
            $post = array(
                "jobId" => $_POST['jobId'],
                "email" => $_POST['email'],
                "password1" => $_POST['password1'],
                "password2" => $_POST['password2'],
                "lastname" => $_POST['lastname'],
                "firstname" => $_POST['firstnname'],
                "phone" => $_POST['phone'],
                "hiredAt" => $_POST['hiredAt']
            );
            $safe = array_map('trim', array_map('strip_tags', $post));
            if (
                isset($safe['email']) && !empty($safe['email'])
                && isset($safe['lastname']) && !empty($safe['lastname'])
                && isset($safe['firstname']) && !empty($safe['firstname'])
                && isset($safe['phone']) && !empty($safe['phone'])
                && isset($safe['hiredAt']) && !empty($safe['hiredAt'])
                && isset($safe['jobId']) && !empty($safe['JobId'])
            ) {

                // ------------------------------ VERIF EMAIL ------------------------------
                if (!filter_var($safe['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'Veuillez rentrer un email valide';
                }

                // ------------------------------ VERIF PRENOM ------------------------------
                if (strlen($safe['firstname']) < 2) {
                    $errors[] = 'Votre prénom doit comporter au moins 2 caractères';
                }
                if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/", $safe['firstname'])) {
                    $errors[] = 'Votre prénom ne doit pas comporter de chiffres ou de caractères spéciaux';
                }

                // ------------------------------ VERIF NOM ------------------------------
                if (strlen($safe['lastname']) < 2) {
                    $errors[] = 'Votre nom doit comporter au moins 2 caractères';
                }
                if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/", $safe['lastname'])) {
                    $errors[] = 'Votre nom ne doit pas comporter de chiffres ou de caractères spéciaux';
                }

                // ------------------------------ VERIF TELEPHONE ------------------------------
                if (preg_match("#[0][- \.?]?[1-9][- \.?]?([0-9][- \.?]?){8}$#", $safe['phone'])) {
                    $phone = str_replace(['.', '-', ' '], '', $safe['phone']);
                } else if (preg_match("#[+][- \.?]?[3][3][- \.?]?[1-9][- \.?]?([0-9][- \.?]?){8}$#", $safe['phone'])) {
                    $phone = str_replace(['.', '-', ' ', '+33'], ['', '', '', '0'], $safe['phone']);
                } else {
                    $errors[] = 'Veuillez rentrer un numéro de téléphone valide';
                }

                if (count($errors) == 0) {

                    $hiredAt = date('Y-m-d', strtotime($safe['hiredAt']));
                    $email = htmlspecialchars($safe['email']);
                    $lastname = htmlspecialchars($safe['lastname']);
                    $job = htmlspecialchars($safe['job']);
                    $firstname = htmlspecialchars($safe['firstname']);
                    $password = 'ZoorificsAnimals1234!';
                    $password = password_hash($password, PASSWORD_ARGON2ID);
                    $this->create($user);
                    $contentEmail = '<p>Bonjour, </p>';
                    $contentEmail .= '<br>Vous venez d\'être ajouté en tant qu\'utilisateur du site <a href=\'http://localhost/zoorifics_animals/index.php?ctrl=home&action=connexion\'>Zoorifics Animals</a> </br>';
                    $contentEmail .= '<br>Vous pouvez dès à présent vous connecter à l\'aide de l\'email que vous utilisez actuellemnt</br>';
                    $contentEmail .= '<br>Votre mot de passe : ZoorificsAnimals1234!</br>';
                    $contentEmail .= "Une fois connecté, pensez à modifier votre mot de passe";
                    $contentEmail .= '<br>Toute l\'équipe de Zoorifics Animals vous souhaite la bienvenue au sein de notre équipe</br>';
                    $contentEmail .= '<hr>';
                    $contentEmail .= '<small>Cet email est un message automatique. Merci de ne pas y répondre</small>';

                    $sendmail = new PHPMailer(true);
                    $sendmail->isSMTP();
                    $sendmail->Host = 'localhost';
                    $sendmail->Port = 1025;
                    $sendmail->SMTPAutoTLS = false;
                    try {
                        $sendmail->setfrom('zoorifics.animals@gmail.com');
                        $sendmail->addAddress($safe['email']);
                        $sendmail->Subject = 'vous êtes inscrit';
                        $sendmail->Body = (strip_tags($contentEmail));
                        $sendmail->send();
                        echo "email envoyé";
                    } catch (Exception $error) {
                        echo "il y a eu une erreur lors de l'envoi de votre email : {$sendmail->ErrorInfo}";
                    }
                }
                
            }else{
                    $elements = ['lastname', 'firstname', 'job', 'hiredAt', 'password1', 'password2'];
                    $errors = $this->validateForm($elements);
                }
            $userRefactory = new User();
            $userRefactory->createUser($user);
            $this->redirect('index.php?ctrl=user&action=index');
        }

        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $hiredAt = $user->getHiredAt();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $phone = $user->getPhone();

        ob_start();
        $title = 'Ajouter un nouvel employé';
        include(__DIR__ . '/../../views/users/add_user.php');
        $content = ob_get_clean();    
    }

    /**
     * cette fonction sert à modifier les informations d'un employé
     * @author aurel
    */
    public function edit(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=user&action=index');
        }

        $userRefactory = new User();
        $user = $userRefactory->getUser($_GET['id']);
        $jobRefactory = new Job;
        $jobs = $jobRefactory->getJobs();

        if (null === $user) {
            $this->redirect('index.php?ctrl=user&action=index');
        }
        if (!empty($_POST)) {
            $post = array(
                "jobId" => $_POST['jobId'],
                "email" => $_POST['email'],
                "password1" => $_POST['password1'],
                "password2" => $_POST['password2'],
                "lastname" => $_POST['lastname'],
                "firstname" => $_POST['firstnname'],
                "phone" => $_POST['phone'],
                "hiredAt" => $_POST['hiredAt']
            );
            $safe = array_map('trim', array_map('strip_tags', $post));
            if (
                isset($safe['email']) && !empty($safe['email'])
                && isset($safe['lastname']) && !empty($safe['lastname'])
                && isset($safe['firstname']) && !empty($safe['firstname'])
                && isset($safe['phone']) && !empty($safe['phone'])
                && isset($safe['hiredAt']) && !empty($safe['hiredAt'])
                && isset($safe['jobId']) && !empty($safe['JobId'])
            ) {

                // ------------------------------ VERIF EMAIL ------------------------------
                if (!filter_var($safe['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'Veuillez rentrer un email valide';
                }

                // ------------------------------ VERIF PRENOM ------------------------------
                if (strlen($safe['firstname']) < 2) {
                    $errors[] = 'Votre prénom doit comporter au moins 2 caractères';
                }
                if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/", $safe['firstname'])) {
                    $errors[] = 'Votre prénom ne doit pas comporter de chiffres ou de caractères spéciaux';
                }

                // ------------------------------ VERIF NOM ------------------------------
                if (strlen($safe['lastname']) < 2) {
                    $errors[] = 'Votre nom doit comporter au moins 2 caractères';
                }
                if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/", $safe['lastname'])) {
                    $errors[] = 'Votre nom ne doit pas comporter de chiffres ou de caractères spéciaux';
                }

                // ------------------------------ VERIF TELEPHONE ------------------------------
                if (preg_match("#[0][- \.?]?[1-9][- \.?]?([0-9][- \.?]?){8}$#", $safe['phone'])) {
                    $phone = str_replace(['.', '-', ' '], '', $safe['phone']);
                } else if (preg_match("#[+][- \.?]?[3][3][- \.?]?[1-9][- \.?]?([0-9][- \.?]?){8}$#", $safe['phone'])) {
                    $phone = str_replace(['.', '-', ' ', '+33'], ['', '', '', '0'], $safe['phone']);
                } else {
                    $errors[] = 'Veuillez rentrer un numéro de téléphone valide';
                }

                if (count($errors) == 0) {

                    $hiredAt = date('Y-m-d', strtotime($safe['hiredAt']));
                    $email = htmlspecialchars($safe['email']);
                    $lastname = htmlspecialchars($safe['lastname']);
                    $job = htmlspecialchars($safe['job']);
                    $firstname = htmlspecialchars($safe['firstname']);
                    $password = $safe['password1'];
                    $password = password_hash($password, PASSWORD_ARGON2ID);
                    $this->edit($user);
                }
            }
            else{
                $elements = ['lastname', 'firstname', 'job', 'hiredAt', 'password1', 'password2'];
                $errors = $this->validateForm($elements);
            }
            $userRefactory = new User();
            $userRefactory->edit($user);
            $this->redirect('index.php?ctrl=user&action=index');
        }

        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $jobId = $user->getJobId();
        $hiredAt = $user->getHiredAt();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $phone = $user->getPhone();

        ob_start();
        $title = 'Ajouter un nouvel employéModifier compte utilisateur';
        include(__DIR__ . '/../../views/users/edit_user.php');
        $content = ob_get_clean();   
    }

    public function delete(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=user&action=index');
        }

        $users = new User();
        $user = $users->getUser($_GET['id']);

        if (null !== $user) {
            $users->delete($_GET['id']);
        }

        $this->redirect('index.php?ctrl=user&action=index');
    }
}
