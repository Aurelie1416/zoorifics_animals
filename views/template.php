<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <h1 class="navbar-brand">Zoorifics Animals</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" href="./index.php?ctrl=job&action=index">Liste des postes</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./index.php?ctrl=user&action=index">Liste du personnel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?ctrl=diet&action=index">Liste des catégories d'animaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?ctrl=breed&action=index">Liste des espèces d'animaux</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?ctrl=activity&action=index">Liste des spectacles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?ctrl=ticket&action=index">Liste des ventes</a>
                        </li>
                            <li class="nav-item">
                            <a class="nav-link" href="./index.php?ctrl=user&action=file&id=<?= $_SESSION['user']['id'] ?>">Mon compte</a>
                        </li>
                            <li class="nav-item">
                            <a class="nav-link" href="./index.php?ctrl=home&action=deconnexion">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container py-4">
            <?= $content ?>
        </div>
    </main>
    <footer style="background-color: #e3f2fd;">
        <p>&copy; ZoorificsAnimals <?= date("Y") ?>, All Right Reserved</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>