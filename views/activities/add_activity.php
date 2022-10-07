<h1>Ajout d'un spectacle</h1>
<div class="card">
    <div class="card-body">
        <?php foreach ($errors as $error) : ?> 
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endforeach; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($safe["name"])) echo $safe["name"]; ?>">
            </div>
            <div class="form-group">
                <label for="schedule">Horaire</label>
                <input type="text" class="form-control" id="schedule" name="schedule" value="<?php if (isset($safe["schedule"])) echo $safe["schedule"]; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description"><?php if (isset($safe["description"])) echo $safe["description"]; ?></textarea>
            </div>
            <label for="animals">Animaux qui participent au spectacle</label>
            <div class="form-check">
                <?php foreach ($animals as $animal) : ?>
                    <input class="form-check-input" type="checkbox" value="" id="animal_<?= $animal->getId() ?>" name="animals">
                    <label class="form-check-label" for="animal_<?= $animal->getId() ?>">
                        <?= $animal->getName() ?> (<?= $breed ?>)
                    </label>
                <?php endforeach; ?>
            </div>

            <label for="animals">Animateur</label>
            <div class="form-check">
                <?php foreach ($animators as $animator) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="animator_<?= $animator->getId() ?>">
                        <label class="form-check-label" for="animator_<?= $animator->getId() ?>">
                        <?= $animator->getName() ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-success" name="save" value="Save">
            </div>
        </form>
    </div>
</div>

<a href="index.php?ctrl=car&action=index" class="mt-4 btn btn-light">Retour</a>