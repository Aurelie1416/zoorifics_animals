<h1>Liste des postes</h1>
<table class="table">
    <thead class="table-light">
        <tr>
            <th>Poste</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jobs as $job) { ?>
            <tr>
                <td>
                <a href="index.php?ctrl=user&action=index&id=<?= $job->getId() ?>" class="btn btn-primary">
                <?= $job->getPost() ?>
                    </a>
                </td>
                <td>
                    <a href="index.php?ctrl=post&action=edit&id=<?= $job->getId() ?>" class="btn btn-primary">
                        Modifier
                    </a>
                    <a href="index.php?ctrl=post&action=delete&id=<?= $job->getId() ?>" class="btn btn-danger">
                        Effacer
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?ctrl=job&action=create" class="card-link">Créer un nouveau poste</a>
