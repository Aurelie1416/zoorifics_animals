<h1>Enregistrer un nouveau salarié</h1>
<div class="card">
    <div class="card-body">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endforeach; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $name ?>">
            </div>
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firsname" value="<?= $firstname ?>">
            </div>
            <div class="form-group">
                <label for="breed">Ancienneté : </label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $hiredAt ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>">
            </div>
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="lphone" value="<?= $phone ?>">
            </div>
            <div class="form-group">
                <select class="form-select" aria-label="Default select example">
                    <?php foreach ($jobs as $job) : ?>
                        <option value="<?= $job->getId() ?>"><?= $job->getPost() ?></option>
                <?php endforeach; ?>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success" name="save" value="Save">
            </div>
        </form>
    </div>
</div>

    <a href="index.php?ctrl=user&action=index" class="mt-4 btn btn-light">Retour</a>