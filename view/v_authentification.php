<?php ?>
<h1>Connexion</h1>
<div class="container">
    <form action="./?action=connection" method="POST">
        <input type="email" name="email" placeholder="Email de connexion" /><br />
        <input type="password" name="passwd" placeholder="Mot de passe" /><br />
        <input type="submit" id="" onclick="storejwt(event)" />
    </form>
</div>
<a href="./?action=inscription">Créer un compte</a>

<br>
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



<script type="text/javascript" src="../js/store_jwt.js"></script>
<script type="text/javascript" src="../js/send_jwt.js"></script>