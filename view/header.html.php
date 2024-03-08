<!-- 
 * Description de entete.html.php
 *
 * @author joel
 * Creation 09/2021
 * Derniere MAJ 01/09/2021
 * definit une fois pour toute le design de l'entete d'une page de l'application 
-->


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style type="text/css">
        @import url("css/menu.css");
        @import url("css/container.css");
    </style>


</head>

<body>
    <nav>

        <ul id="menuGeneral">
            <li><a href="./">Accueil</a></li>
            <li><a href="./?action=comment">Livre d'or</a></li>
            <?php if ($_SESSION["valid_jwt"]) : ?>
                <li><a href=" ./?action=deconnection" onclick="localStorage.removeItem('jwt')">Deconnexion</a></li>
                <li><a href=" ./?action=profil" onclick="sendjwt(event,'profil')">Profil</a></li>
            <?php else : ?>
                <li><a href=" ./?action=connection">Connexion</a></li>
            <?php endif ?>


        </ul>
    </nav>

    <script type="text/javascript" src="../js/send_jwt.js"></script>

    <br /><br /><br /><br />