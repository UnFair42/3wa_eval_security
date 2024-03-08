<h1>Profil</h1>

<?php if ($picture !== "") : ?>
    <div class="container">
        <p> Image de profil</p>
        <img src='<?php echo $picture ?>' alt="">

    </div>
    <br>
<?php endif ?>

<div class="container">
    <b><?php echo $message ?></b>

</div>