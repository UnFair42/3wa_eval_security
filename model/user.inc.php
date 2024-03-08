<?php


include_once ROOTFILE . "/model/bd.inc.php";
include_once ROOTFILE . "/model/User.php";


function writeUser(User $user)
{

    $result = false;

    try {
        $cnx = PDOconnection();


        $sql = "insert into users (firstname, lastname, email, password, status, picture) values (:firstname, :lastname, :email, :password, :status, :picture)";
        $req = $cnx->prepare($sql);
        $req->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue(':status', $user->getStatus(), PDO::PARAM_STR);
        $req->bindValue(':picture', $user->getPicture(), PDO::PARAM_STR);
        $result = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}


function readUserByEmail(String $email)
{

    $result = array();
    try {
        $cnx = PDOconnection();
        $sql = "select * from users where email=:email ";
        $req = $cnx->prepare($sql);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}
