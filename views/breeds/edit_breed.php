<h1>Modifier les informations de l'espèce <?= $name ?></h1>
<div class="card">
    <div class="card-body">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endforeach; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="form-group">
                <select class="form-select" aria-label="Default select example">
                    <?php foreach ($diets as $diet) : ?>
                        <option value="<?= $diet->getId() ?>"><?= $diet->getName() ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Informations complémentaires</label>
                <textarea class="form-control" id="status" rows="3"><?= $description ?></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="save" value="Save">
            </div>
        </form>
    </div>
</div>

<a href="index.php?ctrl=breed&action=index" class="mt-4 btn btn-light">Retour</a>