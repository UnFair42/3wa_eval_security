<?php


if (!defined("ROOTFILE")) {
    define("ROOTFILE", dirname(__FILE__, 2));
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require ROOTFILE . '/vendor/autoload.php';
include_once ROOTFILE . "/model/User.php";
include_once ROOTFILE . "/model/user.inc.php";


use \Firebase\JWT\JWT;
use \Firebase\JWT\KEY;
use Dotenv\Dotenv;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Origin, Accept,Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$dataJson = json_decode(file_get_contents("php://input"));



if (isset($dataJson->jwt)) {

    $token = htmlspecialchars($dataJson->jwt);
    $dotenv = Dotenv::createImmutable(ROOTFILE);
    $dotenv->safeLoad();
    $secret_key = $_ENV['SECRET_KEY'];

    try {
        $jwt = JWT::decode($token, new Key($secret_key, 'HS512'));
        http_response_code(200);
        $_SESSION["logged_user"] = $jwt->data->email;
        $_SESSION["valid_jwt"] = true;
    } catch (\Throwable $e) {
        http_response_code(401);
        print("error:" . $e);
        $_SESSION["logged_user"] = "";
        $_SESSION["valid_jwt"] = false;
    }
} else {
    http_response_code(401);
    echo json_encode(array("message" => "Wrong jwt"));
}
