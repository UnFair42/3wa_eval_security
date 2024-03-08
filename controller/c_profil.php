<?php
include_once ROOTFILE . "/model/User.php";
include_once ROOTFILE . "/model/user.inc.php";
$file = "/view/v_homepage.php";
$message = "";
$picture = "";
if ($_SESSION["valid_jwt"] && $_SESSION["logged_user"] !== "") {

    $file = "/view/v_profil.php";
    $email =  $_SESSION["logged_user"];
    try {
        $dbUser = readUserByEmail($email);

        if ($dbUser) {
            $user = new User(...$dbUser);
            $message = "Bienvenue " . $user->getFirstname() . " " . $user->getLastname() . ".<br>";
            switch ($user->getStatus()) {
                case "admin":
                    $message .= "Tu es administrateur. ";
                    break;
                case "user":
                    $message .= "Tu es utilisateur. ";

                    break;
                default:
                    break;
            }

            if ($user->getPicture() !== "") {
                $picture =  "./uploads/" . $user->getPicture();
            }
        }
    } catch (\Throwable $e) {
        # code...
    }
}


$title = "Profil";

include_once ROOTFILE . "/view/header.html.php";
include_once ROOTFILE . $file;
