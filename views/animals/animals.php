<h1><?= $animals->getBreed() ?></h1>

<div class="card text-center" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">A propos de <?= $breed->getName() ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Régime alimentaire : <?= $diet->getName() ?></h6>
        <p class="card-text"><?= $breed->getDescription() ?></p>
    </div>
</div>
<h2>Liste des <?= $animals->getBreed() ?></h2>
<table class="table">
    <thead class="table-light">
        <tr>
            <th>Nom</th>
            <th>Sexe</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animals as $animal) { ?>
            <tr>
                <td><a href="index.php?ctrl=animal&action=display&id=<?= $breed->getId() ?>" class="btn btn-primary">
                    <?= $animal->getName(); ?>
                </a></td>
                <td><?php if($animal->getSexe() == true){
                    echo '♂';
                }else{
                    echo '♀';
                } ?></td>
                <td>
                    <a href="index.php?ctrl=animal&action=edit&id=<?= $animal->getId() ?>" class="btn btn-primary">
                        Modifier
                    </a>
                    <a href="index.php?ctrl=animal&action=delete&id=<?= $animal->getId() ?>" class="btn btn-danger">
                        Effacer
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?ctrl=breed&action=edit&id=<?= $_POST['id'] ?>" class="mt-4 btn btn-light">Modifier les informations de l'espèce <?= $breed->getName() ?></a>
<a href="index.php?ctrl=animal&action=create" class="card-link">Ajouter un nouvel animal</a>
<a href="index.php?ctrl=breed&action=delete&id=<?= $breed->getId() ?>" class="btn btn-danger">
    Effacer cette espèce
    <small>Cette action n'est utilisable que si la liste d'animaux appartenant à cette espèce est vide</small>
</a>