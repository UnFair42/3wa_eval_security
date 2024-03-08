<h1>Inscription</h1>
<div class="container">
    <form enctype="multipart/form-data" action="./?action=inscription" method="POST">
        <label> Nom </label><input type="text" name="lastname" placeholder="Paul" required /><br />
        <label> Prénom </label><input type="text" name="firstname" placeholder="Jean" required /><br />
        <label> Email de connexion </label><input type="email" name="email" placeholder="test@test.test" required /><br />
        <label> Mot de passe </label><input type="password" name="passwd" placeholder="Securedp@ssword" required /><br />
        <label> Confirmer le mot de passe </label><input type="password" name="passwd_confirm" placeholder="Securedp@ssword" required /><br />
        <label> Image de profil </label><input type="file" name="uploaded" /><br />
        <label> Type </label><select name="status">
            <option value="admin">Administrateur</option>
            <option value="user">Utilisateur</option>
        </select>
        <input type="submit" />
    </form>
</div>

<div class="container">
    <?php if (isset($message) && strlen($message)) : ?>
        <?php echo $message; ?>
    <?php endif ?>
</div>

<?php if (isset($err) && strlen($err)) : ?>
    <div class="container" style="background-color: red;">
        <?php echo $err; ?>
    </div>
<?php endif ?>