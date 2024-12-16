<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");
include_once(__DIR__ . "/../../../vendor/autoload.php");

define("JWT_SECRET", "WHAT-IS-SECRET-KEY");
define("JWT_ALGO", "HS512");

use App\Classes\Setting;
use App\Classes\User;
use App\Classes\Validation;
use Firebase\JWT\JWT;

$VALIDATION = new Validation();
$USER = new User();
$SETTING = new Setting();
$system = $SETTING->SystemView();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$MAIL = new PHPMailer(true);
$MAIL->SMTPDebug = SMTP::DEBUG_OFF;
$MAIL->isSMTP();
$MAIL->Host = "smtp.gmail.com";
$MAIL->SMTPAuth = true;
$MAIL->Username = $system['email'];
$MAIL->Password = $system['email_password'];
$MAIL->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$MAIL->Port = 465;
$MAIL->CharSet = "UTF-8";
$MAIL->SMTPOptions = [
  "ssl" => [
    "verify_peer" => false,
    "verify_peer_name" => false,
    "allow_self_signed" => true
  ]
];

$param = (isset($params) ? explode("/", $params) : "");
$action = (isset($param[0]) ? $param[0] : "");
$param1 = (isset($param[1]) ? $param[1] : "");
$param2 = (isset($param[2]) ? $param[2] : "");

if ($action === "login") {
  try {
    $email = (isset($_POST['email']) ? $VALIDATION->Input($_POST['email']) : "");

    $count = $USER->UserCount([$email]);
    if (intval($count) === 0) {
      $VALIDATION->Alert("danger", "ไม่พบข้อมูล กรุณาลองอีกครั้ง!", "/");
    }

    $random = $VALIDATION->RandomPassword();

    try {
      $MAIL->setFrom($system['email'], $system['email_name']);
      $MAIL->addAddress($email, $email);

      $MAIL->isHTML(true);
      $MAIL->Subject = "[รหัสผ่าน เพื่อเข้าสู่ระบบ]";
      $MAIL->Body = $VALIDATION->SendPassword($random);
      $MAIL->send();
    } catch (Exception $e) {
      $VALIDATION->Alert("danger", "ระบบอีเมลมีปัญหา กรุณาลองอีกครั้ง!", "/");
    }

    $USER->InsertPassword([$email, $random]);
    $_SESSION['email'] = $email;
    $VALIDATION->Alert("success", "รหัสผ่านส่งไปที่อีเมลแล้ว!", "/check");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

if ($action === "check") {
  try {
    $email = (isset($_POST['email']) ? $VALIDATION->Input($_POST['email']) : "");
    $password = (isset($_POST['password']) ? $VALIDATION->Input($_POST['password']) : "");

    $random = $USER->LastPassword([$email]);
    if (intval($password) !== intval($random)) {
      $VALIDATION->Alert("danger", "รหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง!", "/check");
    }

    $now = time();
    $payload = [
      "iat" => $now,
      "exp" => $now + (4 * (60 * 60)),
      "data" => $email,
    ];
    $encode = JWT::encode($payload, JWT_SECRET, JWT_ALGO);
    setcookie(
      "jwt",
      $encode,
      time() + (4 * 60 * 60),
      "/",
      "",
      isset($_SERVER["HTTPS"]),
      true
    );

    $USER->UpdatePassword([$email, $password]);
    $VALIDATION->Alert("success", "เข้าสู่ระบบเรียบร้อยแล้ว!", "/home");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}
