<?php



require ROOTFILE . '/vendor/autoload.php';


$title = "Accueil";

$file = "v_homepage.php";
include_once ROOTFILE . "/view/header.html.php";
include_once ROOTFILE . "/view/" . $file;
