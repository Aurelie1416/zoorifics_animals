<h1>Modifier les informations de <?= $name ?></h1>
<div class="card">
    <div class="card-body">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endforeach; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
            </div>
            <label for="animals">Sexe</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="male" value="true" <?php if($name == true){?> checked <?php } ?>>
                    <label class="form-check-label" for="male">♂</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="femele" value="false" <?php if($name == false){?> checked <?php } ?>>
                    <label class="form-check-label" for="femele">♀</label>
                </div>
            </div>
            <div class="form-group">
                <label for="breed">Espèce</label>
                <input type="text" class="form-control" id="breed" name="breed" value="<?= $breed ?>">
            </div>
            <div class="form-group">
                <label for="breed">Né le</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $birthdate ?>">
            </div>
            <div class="form-group">
                <label for="breed">Poids (en Kg)</label>
                <input type="text" class="form-control" id="weight" name="weight" value="<?= $weight ?>">
            </div>
            <div class="form-group">
                <label for="breed">Dernier RDV médical le</label>
                <input type="date" class="form-control" id="lastMedicalCheck" name="lastMedicalCheck" value="<?= $lastMedicalCheck ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Information/Bilan de santé</label>
                <textarea class="form-control" id="status" rows="3"><?= $status ?></textarea>
            </div>
            <div class="form-group">
                <label for="breed">Prochain RDV médical le</label>
                <input type="date" class="form-control" id="nextMedicalCheck" name="nextMedicalCheck" value="<?= $nextMedicalCheck ?>">
            </div>
            <div class="mb-3">
                <label for="image"></label>
                <input name="image" id="image" type="file" class="form-control">
                <div>Seules les images de type png/jpg/jpeg sont autorisées</div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success" name="save" value="Save">
            </div>
        </form>
    </div>
</div>

<a href="index.php?ctrl=animal&action=index&id=<?= $animal->getId() ?>" class="mt-4 btn btn-light">Retour</a>