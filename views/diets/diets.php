<h1>Liste des catégories d'espèces</h1>

<ol class="list-group list-group-numbered">
    <?php foreach ($diets as $diet) { ?>
        <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-<?= $diet->getColor() ?>">
            <div class="ms-2 me-auto">
                <div class="fw-bold">
                <a href="index.php?ctrl=animal&action=index&id=<?= $breed->getBreed($diet->getBreedId())->getId() ?>" class="btn btn-primary">
                    <?= $diet->getName() ?>
                </a></div>
                <a href="index.php?ctrl=diet&action=edit&id=<?= $diet->getId() ?>" class="btn btn-primary">
                    Modifier
                </a>
            </div>
            <span class="badge bg-<?= $diet->getColor() ?> rounded-pill"><?= $number->getCountBreedsByDiet($diet->getId()) ?></span>
        </li>
    <?php } ?>
</ol>