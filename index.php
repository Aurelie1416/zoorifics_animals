<?php 
require __DIR__ . '/vendor/autoload.php';
use App\ZoorificsAnimals\controllers\UserController;
use App\ZoorificsAnimals\controllers\BreedController;
use App\ZoorificsAnimals\controllers\ActivityController;
use App\ZoorificsAnimals\controllers\TicketController;
use App\ZoorificsAnimals\controllers\AnimalController;
use App\ZoorificsAnimals\controllers\JobController;
use App\ZoorificsAnimals\controllers\DietController;

    $ctrl = $_GET['ctrl'] ?? "home";
    $action = $_GET['action'] ?? "connexion";

    $controller = null;
    switch ($ctrl) {
        case "home":
            $controller = new UserController();
            break;
        case "breed":
            $controller = new BreedController();
            break;
        case "diet":
            $controller = new DietController();
            break;
        case "activity":
            $controller = new ActivityController();
            break;
        case "ticket":
            $controller = new TicketController();
            break;
        case "animal":
            $controller = new AnimalController();
            break;
        case "job":
            $controller = new JobController();
            break;
        case "user":
            $controller = new UserController();
            break;
    }

    if ($controller !== null && method_exists($controller, $action)) {
        $controller->$action();

    } else {
        http_response_code(404);
        echo "Page not found";
    }