<h1>Liste des spectacles</h1>
<table class="table">
    <thead class="table-light">
        <tr>
            <th>Spectacle</th>
            <th>Horaire</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($activities as $activity) { ?>
            <tr>
                <td><a href="index.php?ctrl=activity&action=display&id=<?= $activity->getId() ?>" class="btn btn-primary">
                        <?= $activity->getName(); ?>
                    </a></td>
                <td><?= $activity->getSchedule(); ?></td>
                <td>
                    <a href="index.php?ctrl=activity&action=edit&id=<?= $activity->getId() ?>" class="btn btn-primary">
                        Modifier
                    </a>
                    <a href="index.php?ctrl=activity&action=delete&id=<?= $activity->getId() ?>" class="btn btn-danger">
                        Effacer
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?ctrl=activity&action=create" class="card-link">Créer un nouveau spectacle</a>