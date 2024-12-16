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

if ($action === "system-update") {
  try {
    $name = (isset($_POST['name']) ? $VALIDATION->Input($_POST['name']) : "");
    $email = (isset($_POST['email']) ? $VALIDATION->Input($_POST['email']) : "");
    $email_name = (isset($_POST['email_name']) ? $VALIDATION->Input($_POST['email_name']) : "");
    $email_password = (isset($_POST['email_password']) ? $VALIDATION->Input($_POST['email_password']) : "");

    $SETTING->SystemUpdate([$name, $email, $email_name, $email_password]);
    $VALIDATION->Alert("success", "ดำเนินการเรียบร้อย!", "/setting/system");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

if ($action === "service-add") {
  try {
    foreach ($_POST['item_sequence'] as $key => $value) {
      $item_sequence = (isset($_POST['item_sequence'][$key]) ? $VALIDATION->input($_POST['item_sequence'][$key]) : "");
      $item_name = (isset($_POST['item_name'][$key]) ? $VALIDATION->input($_POST['item_name'][$key]) : "");
      $item_link = (isset($_POST['item_link'][$key]) ? $VALIDATION->input($_POST['item_link'][$key]) : "");

      $count = $SETTING->ServiceCount([$item_name]);
      if (intval($count) === 0 && !empty($item_name)) {
        $SETTING->ServiceCreate([$item_sequence, $item_name, $item_link]);
      }
    }

    foreach ($_POST['item__uuid'] as $key => $value) {
      $item__uuid = (isset($_POST['item__uuid'][$key]) ? $VALIDATION->input($_POST['item__uuid'][$key]) : "");
      $item__sequence = (isset($_POST['item__sequence'][$key]) ? $VALIDATION->input($_POST['item__sequence'][$key]) : "");
      $item__name = (isset($_POST['item__name'][$key]) ? $VALIDATION->input($_POST['item__name'][$key]) : "");
      $item__link = (isset($_POST['item__link'][$key]) ? $VALIDATION->input($_POST['item__link'][$key]) : "");

      $SETTING->ServiceUpdate([$item__sequence, $item__name, $item__link, $item__uuid]);
    }

    $VALIDATION->Alert("success", "ดำเนินการเรียบร้อย!", "/setting/service");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

if ($action === "service-delete") {
  try {
    $data = json_decode(file_get_contents("php://input"), true);
    $uuid = $data['uuid'];

    if (!empty($uuid)) {
      $SETTING->ServiceDelete([$uuid]);
      echo json_encode(200);
    } else {
      echo json_encode(500);
    }
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

if ($action === "authorize-update") {
  try {
    $user_id = (isset($_POST['user_id']) ? $VALIDATION->Input($_POST['user_id']) : "");
    $service = (isset($_POST['service']) ? implode(",", $_POST['service']) : "");

    $SETTING->AuthorizeUpdate([$service, $user_id]);
    $VALIDATION->Alert("success", "ดำเนินการเรียบร้อย!", "/setting/authorize");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}
