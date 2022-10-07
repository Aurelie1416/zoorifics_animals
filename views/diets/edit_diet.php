<h1>Modifier les informations de la catégorie <?= $name ?></h1>
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
            <div class="mb-3">
                <label for="status"  class="form-label">Informations</label>
                <textarea name="status" class="form-control" id="status" rows="3"><?= $description ?></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="save" value="Save">
            </div>
        </form>
    </div>
</div>

<a href="index.php?ctrl=diet&action=index" class="mt-4 btn btn-light">Retour</a>