<h2>Liste des employés

    <?php if (isset($_GET['id'])) {
        echo $post->getPost();
    } ?>

</h2>
<table class="table">
    <thead class="table-light">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <?php if (!isset($_GET['id'])) { ?>
                <th>Poste</th>
            <?php } ?>

            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><a href="index.php?ctrl=user&action=display&id=<?= $user->getId() ?>" class="btn btn-primary">
                        <?= $user->getLastname(); ?>
                    </a>
                </td>
                <td><a href="index.php?ctrl=user&action=display&id=<?= $user->getId() ?>" class="btn btn-primary">
                        <?= $user->getFirstname(); ?>
                    </a></td>
                <?php if (!isset($_GET['id'])) { ?>
                    <td><?= $job->getJob($user->getJobId())->getPost(); ?></td>
                <?php } ?>
                <td>
                    <a href="index.php?ctrl=user&action=edit&id=<?= $user->getId() ?>" class="btn btn-primary">
                        Modifier
                    </a>
                    <a href="index.php?ctrl=user&action=delete&id=<?= $user->getId() ?>" class="btn btn-danger">
                        Effacer
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>