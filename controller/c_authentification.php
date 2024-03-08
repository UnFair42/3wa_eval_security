<?php
include_once ROOTFILE . "/model/User.php";
include_once ROOTFILE . "/model/user.inc.php";
$file = "/view/v_authentification.php";

if (isset($_SESSION["valid_jwt"]) && $_SESSION["valid_jwt"]) {
    $_SESSION["valid_jwt"] = false;
}


$title = "Connexion";
include_once ROOTFILE . "/view/header.html.php";
include_once ROOTFILE . $file;
