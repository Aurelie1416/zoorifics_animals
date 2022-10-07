<?php if($_SESSION['id'] == $_GET['id']){ ?> Mon compte<?php } ?>
<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title"><?= $lastname.' '.$firstname ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $post->getPost() ?></h6>
        <p class="card-text">Embaucher de puis le : <?= $hiredDate ?></p>
        <p class="card-text">Email : <?= $email ?></p>
        <p class="card-text">Téléphone : <?= $phone ?></p>
        <a href="index.php?ctrl=user&action=edit&id=<?= $user->getId() ?>" class="card-link">Modifier mes informations</a>
    </div>
</div>