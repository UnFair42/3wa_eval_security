<?php

define("ROOTFILE", dirname(__FILE__));

include_once ROOTFILE . '/controller/mainController.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "default";
}

$file = router($action);
include_once ROOTFILE . "/controller/$file";
