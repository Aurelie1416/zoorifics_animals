<div class="card mb-3">
  <img src="./../../assets/<?= $image ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nom : <?= $name ?></h5>
    <h6 class="card-text">Espèce : <?= $breed->getName() ?></h6>
    <h6 class="card-text">Sèxe : <?= $sexe ?></h6>
    <h6 class="card-text">Date de naissance : <?= $birthdate ?></h6>
    <p class="card-text">Dernière visite médicale : <?= $lastMedicalCheckAt() ?></p>
    <p class="card-text">Prochaine visite médicale : <?= $nextMedicalCheckAt() ?></p>
    <p class="card-text">Bilan de santé : <?= $status ?></p>
    <p class="card-text"><small class="text-muted">Poids : <?= $weight ?>Kg</small></p>
  </div>
</div>
<a href="index.php?ctrl=animal&action=edit&id=<?= $animal->getId() ?>" class="card-link">Modifier</a>
 