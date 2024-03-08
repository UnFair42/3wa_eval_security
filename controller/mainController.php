<?php





include_once ROOTFILE . "/model/bd.inc.php";


function router(string $action)
{
    $actions = array();
    $actions["default"] = "c_homepage.php";
    $actions["inscription"] = "c_inscription.php";
    $actions["connection"] = "c_authentification.php";
    $actions["deconnection"] = "c_authentification.php";
    $actions["profil"] = "c_profil.php";
    $actions["comment"] = "c_comment.php";



    if (array_key_exists($action, $actions)) {
        $result = $actions[$action];
    } else {
        $result = $actions["default"];
    }
    return $result;
}
