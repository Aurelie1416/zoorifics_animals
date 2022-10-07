<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title"><?= $name ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $schedule ?></h6>
        <p class="card-text"><?= $description ?></p>
        <p class="card-text"><?= $animator->getFirstName() ?> <?= $animator->getLastName() ?></p>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Liste des animaux qui participent au spectacles
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($animalsByActivity as $animal) { ?>
                    <li class="list-group-item"><a href="index.php?ctrl=animal&action=index&id=<?= $animal->getId() ?>"><?= $animal->getName(); ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <a href="index.php?ctrl=activity&action=edit&id=<?= $activity->getId() ?>" class="card-link">Modifier</a>
    </div>
</div>