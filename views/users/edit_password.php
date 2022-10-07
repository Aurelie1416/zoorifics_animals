<h1>Réinitialiser votre mot de passe</h1>
<?php foreach ($errors as $error) : ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endforeach; ?>
<form method="POST" enctype="multipart/form-data">
    <div>
        <label for="password1">Nouveau mot de passe</label>
        <input type="text" id="password1" name="password1" value="<?php if (isset($safe["password1"])) echo $safe["password1"]; ?>">
    </div>
    <div>
        <label for="password2">Vérification Mot de passe</label>
        <input type="password2" id="password2" name="password2" value="<?php if (isset($safe["password2"])) echo $safe["password2"]; ?>">
    </div>
    <div>
        <button>Je valide</button>
    </div>
</form>