<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");
include_once(__DIR__ . "/../../../vendor/autoload.php");

use App\Classes\Setting;
use App\Classes\Validation;

$VALIDATION = new Validation();
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

if ($action === "create") {
  try {
    echo "<pre>";
    print_r($_POST);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

if ($action === "month-select") {
  try {
    $result = $VALIDATION->MonthTh();

    $data = [];
    foreach ($result as $key => $value) {
      $key++;
      $data[] = [
        "id" => $key,
        "text" => $value,
      ];
    }

    echo json_encode($data);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

if ($action === "input-type-select") {
  try {
    $result = $VALIDATION->InputType();

    $data = [];
    foreach ($result as $key => $value) {
      $key++;
      $data[] = [
        "id" => $key,
        "text" => $value,
      ];
    }

    echo json_encode($data);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}
