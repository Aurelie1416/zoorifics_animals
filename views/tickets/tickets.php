<h2>Valider un nouveau ticket</h2>
<div class="card">
    <div class="card-body">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endforeach; ?>
        <form method="post" action="">
            <label for="animals">Tarif</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rate" id="child" value="child">
                    <label class="form-check-label" for="child">Enfant</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rate" id="adult" value="adult">
                    <label class="form-check-label" for="adult">Adult</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="save" value="Save">
            </div>
        </form>
    </div>
</div>
<h2>Liste des ventes</h2>
<table class="table">
    <thead class="table-light">
        <tr>
            <th>Numéro</th>
            <th>Prix</th>
            <th>Date</th>
            <th class="actions"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tickets as $ticket) { ?>
            <tr>
                <td><?= $ticket->getNumber(); ?></td>
                <td><?= $ticket->getPrice(); ?>&euro;</td>
                <td><?= $ticket->getBoughtAt(); ?></td>
                <td>
                    <a href="index.php?ctrl=post&action=print&id=<?= $ticket->getId() ?>" class="btn btn-primary">
                        Imprimer
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>