<h1>Enregistrer un nouveau métier</h1>
<div class="card">
    <div class="card-body">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endforeach; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="post">Poste</label>
                <input type="text" class="form-control" id="post" name="post" value="<?php if (isset($safe["post"])) echo $safe["post"]; ?>">
            </div>
            <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="ADMIN" id="admin">
                    <label class="form-check-label" for="admin">
                        <?= $role ?>
                    </label>
                    <input class="form-check-input" type="checkbox" value="RH_STAFF" id="rh">
                    <label class="form-check-label" for="rh">
                        <?= $role ?>
                    </label>
                    <input class="form-check-input" type="checkbox" value="MEDICAL_STAFF" id="medical">
                    <label class="form-check-label" for="medical">
                        <?= $role ?>
                    </label>
                    <input class="form-check-input" type="checkbox" value="RECEPTION_STAFF" id="<?= $role ?>">
                    <label class="form-check-label" for="recetion">
                        <?= $role ?>
                    </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="save" value="Save">
            </div>
        </form>
    </div>
</div>
<a href="index.php?ctrl=job&action=index" class="mt-4 btn btn-light">Retour</a>