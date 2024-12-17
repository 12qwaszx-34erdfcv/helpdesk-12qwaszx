<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");
include_once(__DIR__ . "/../../../vendor/autoload.php");

use App\Classes\Setting;
use App\Classes\User;
use App\Classes\Validation;

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

if ($action === "view") {
  try {
    $id = (isset($_POST['id']) ? $VALIDATION->Input($_POST['id']) : "");
    $firstname = (isset($_POST['firstname']) ? $VALIDATION->Input($_POST['firstname']) : "");
    $lastname = (isset($_POST['lastname']) ? $VALIDATION->Input($_POST['lastname']) : "");
    $contact = (isset($_POST['contact']) ? $VALIDATION->Input($_POST['contact']) : "");

    $USER->UserUpdate([$firstname, $lastname, $contact, $id]);
    $VALIDATION->Alert("success", "ดำเนินการเรียบร้อย!", "/user/view");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}
