<?php


include_once ROOTFILE . "/model/bd.inc.php";
include_once ROOTFILE . "/model/User.php";


function writeComment(Comment $comment)
{

    $result = false;

    try {
        $cnx = PDOconnection();


        $sql = "insert into comments (message, name) values (:message, :name)";
        $req = $cnx->prepare($sql);
        $req->bindValue(':message', $comment->getMessage(), PDO::PARAM_STR);
        $req->bindValue(':name', $comment->getName(), PDO::PARAM_STR);

        $result = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}


function readComments()
{

    $result = array();
    try {
        $cnx = PDOconnection();
        $sql = "select * from comments  ";
        $req = $cnx->prepare($sql);
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $result[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}
