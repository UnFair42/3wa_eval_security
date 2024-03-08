<?php
include_once ROOTFILE . "/model/Comment.php";
include_once ROOTFILE . "/model/comment.inc.php";
if (isset($_POST['btnSign'])) {


    $message = trim($_POST['mtxMessage']);
    $name    = trim($_POST['txtName']);


    $message = stripslashes($message);
    $message = htmlspecialchars($message);

    $name = stripslashes($name);
    $name = htmlspecialchars($name);


    $newComment = new Comment($message, $name);


    try {
        writeComment($newComment);
    } catch (\Throwable $e) {
        print('error:' . $e);
    }
}

try {
    $comments = readComments();
} catch (\Throwable $e) {
    print('error:' . $e);
}

$title = "Commentaire";

include_once ROOTFILE . "/view/header.html.php";
include_once ROOTFILE . "/view/v_comment.php";
