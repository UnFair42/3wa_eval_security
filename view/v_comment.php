<div class="container">
    <form action="./?action=comment" method="POST">
        <label>Nom *</label>
        <input name="txtName" type="text" size="30" maxlength="10"><br />
        <label>Message *</label>
        <textarea name="mtxMessage" cols="50" rows="3" maxlength="50"></textarea>
        <br />

        <input name="btnSign" type="submit" value="Signer">
        <input name="btnClear" type="reset" value="Effacer">
    </form>
</div>
<br /><br />

<?php
foreach ($comments as $comment) : ?>

    <div class="container">
        <b>Auteur :</b><br />
        <?php echo $comment["name"] ?><br />

        <b>Message :</b><br />
        <?php echo $comment["message"] ?><br />
    </div>

    <br /><br />
<?php endforeach ?>