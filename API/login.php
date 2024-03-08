<?php


if (!defined("ROOTFILE")) {
    define("ROOTFILE", dirname(__FILE__, 2));
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION["valid_jwt"] = false;
require ROOTFILE . '/vendor/autoload.php';
include_once ROOTFILE . "/model/User.php";
include_once ROOTFILE . "/model/user.inc.php";


use \Firebase\JWT\JWT;
use Dotenv\Dotenv;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Origin, Accept,Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$dataJson = json_decode(file_get_contents("php://input"));
if (isset($dataJson->email) && $dataJson->password) {

    $data = [
        "email" => htmlspecialchars($dataJson->email),
        "password" => htmlspecialchars($dataJson->password),
    ];

    $dbUser = readUserByEmail($data["email"]);

    if ($dbUser) {
        if (password_verify($data["password"], $dbUser["password"])) {
            $user = new User(...$dbUser);
            $dotenv = Dotenv::createImmutable(ROOTFILE);
            $dotenv->safeLoad();
            $secret_key = $_ENV['SECRET_KEY'];
            $issuer_claim = $_SERVER['SERVER_NAME']; // this can be the servername
            $issuedat_claim = time(); // issued at
            $notbefore_claim = $issuedat_claim + 1; //not before in seconds
            $expire_claim = $issuedat_claim + 600; // expire time in seconds
            $token = array(
                "iss" => $issuer_claim,
                "iat" => $issuedat_claim,
                "nbf" => $notbefore_claim,
                "exp" => $expire_claim,
                "data" => array(
                    "firstname" => $user->getFirstname(),
                    "lastname" => $user->getLastname(),
                    "email" => $user->getEmail(),
                )
            );

            http_response_code(200);

            $jwt = JWT::encode($token, $secret_key, 'HS512');
            echo json_encode(
                array(
                    "message" => "Successful login.",
                    "jwt" => $jwt,
                    "email" => $user->getEmail(),
                    "expireAt" => $expire_claim
                )
            );
            $_SESSION["valid_jwt"] = true;
        } else {

            http_response_code(401);
            echo json_encode(array("message" => "Login failed.", "password" => $data["password"]));
        }
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Login failed.", "password" => $data["password"]));
    }
} else {
    http_response_code(401);
    echo json_encode(array("message" => "Login failed."));
}
