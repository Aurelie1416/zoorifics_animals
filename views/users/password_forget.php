<h1>Mot de passe oublié</h1>
<?php foreach ($errors as $error) : ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endforeach; ?>
<form method="POST" enctype="multipart/form-data">
    <div>
        <label for="pemail">Email</label>
        <input type="text" id="email" name="email" value="<?php if (isset($safe["email"])) echo $safe["password1"]; ?>">
    </div>
    <div>
        <button class="btn btn-primary">Je réinitialise mon mot de passe</button>
    </div>
</form>