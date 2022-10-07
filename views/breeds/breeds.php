<h1>Liste des espèces</h1>
<?php if (isset($_GET['id'])) { ?>
    <h2><?= $diet->getName();?></h2>
    <p><?= $diet->getDescription() ?></p>
<?php } ?>

<ol class="list-group list-group-numbered">
    <?php foreach ($breeds as $breed) { ?>
        <li class="list-group-item d-flex justify-cont ent-between align-items-start list-group-item-<?= $diet->getColor() ?>">
            <div class="ms-2 me-auto">
                <div class="fw-bold">
                <a href="index.php?ctrl=animal&action=index&id=<?= $breed->getId() ?>" class="btn btn-primary">
                    <?= $breed->getName() ?>
                </a></div>
                <a href="index.php?ctrl=breed&action=edit&id=<?= $breed->getId() ?>" class="btn btn-primary">
                    Modifier
                </a>
            </div>
            <span class="badge bg-<?= $diet->getColor() ?> rounded-pill"><?= $animals->getCountAnimalsByBreed($breed->getId()) ?></span>
        </li>
    <?php } ?>
</ol>
<a href="index.php?ctrl=breed&action=create" class="card-link">Ajouter une nouvelle espèce</a>