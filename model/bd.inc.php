<?php
/*
 * Description de bd.inc.php
 *
 * @author rémy
 * Creation 02/2022
 * Derniere MAJ 27/02/2022
 * 
 * definition de la fonction de connexion à la BDD
 */
function PDOconnection()
{
    $login = "root";
    $mdp = "";
    $bd = "eva_security";
    $serveur = "localhost"; // localhost ou adresse IP du serveur de BDD
    //Serveur web/BDD identique
    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}
