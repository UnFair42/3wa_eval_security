<?php
include_once ROOTFILE . "/model/User.php";
include_once ROOTFILE . "/model/user.inc.php";
require ROOTFILE . '/vendor/autoload.php';
$file = "/view/v_inscription.php";
$message = "";
$err = "";
if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["passwd"]) && isset($_POST["passwd_confirm"])) {

    if ($_POST["passwd"] !== $_POST["passwd_confirm"]) {
        $err .= "Les mots de passe de correspondent pas.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $err .= " L'email n'est pas valide.";
    } else {

        $data = [
            "firstname" => htmlspecialchars(($_POST["firstname"])),
            "lastname" => htmlspecialchars(($_POST["lastname"])),
            "email" => htmlspecialchars(($_POST["email"])),
            "password" => password_hash(htmlspecialchars(($_POST["passwd"])), PASSWORD_DEFAULT),
            "status" => htmlspecialchars(($_POST["status"])),

        ];
        if (isset($_FILES["uploaded"]) && $_FILES["uploaded"]['size'] > 0) {


            $uploaded_name = $_FILES['uploaded']['name'];
            $uploaded_ext  = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
            $uploaded_size = $_FILES['uploaded']['size'];
            $uploaded_type = $_FILES['uploaded']['type'];
            $uploaded_tmp  = $_FILES['uploaded']['tmp_name'];

            $target_path   = ROOTFILE . '/uploads/';
            $target_file   =  md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;


            if ((strtolower($uploaded_ext) == 'jpg' || strtolower($uploaded_ext) == 'jpeg' || strtolower($uploaded_ext) == 'png') &&
                ($uploaded_size < 100000) &&
                ($uploaded_type == 'image/jpeg' || $uploaded_type == 'image/png') &&
                getimagesize($uploaded_tmp)
            ) {



                if (rename($uploaded_tmp, ($target_path . $target_file))) {
                    $data["picture"] = $target_file;
                    $message .= "L'image a bien été chargée.";
                } else {
                    $err .= "L'image n'a pas pu être chargée";
                }
            }
        }

        $newUser = new User(...$data);
        try {
            writeUser($newUser);
            $file = "/controller/c_authentification.php";
            $message .= "Inscription réussie, veuillez vous connecter.";
        } catch (\Throwable $e) {
            print("erreur:" . $e);
        }
    }
}

$title = "Inscription";

include_once ROOTFILE . "/view/header.html.php";
include_once ROOTFILE . $file;
