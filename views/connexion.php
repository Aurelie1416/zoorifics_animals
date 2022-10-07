<h1>Connexion</h1>
<?php foreach ($errors as $error) : ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endforeach; ?>
<form method="POST" enctype="multipart/form-data">
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?php if (isset($safe["email"])) echo $safe["email"]; ?>">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" value="<?php if (isset($safe["password"])) echo $safe["password"]; ?>">
    </div>
    <div>
        <button class="btn btn-primary">Je me connecte</button>
    </div>
</form>
<a href="index.php?ctrl=user&action=forgetpassword" class="mt-4 btn btn-light">Mot de passe oublié</a>