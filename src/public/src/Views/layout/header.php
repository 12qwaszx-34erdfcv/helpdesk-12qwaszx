<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");
include_once(__DIR__ . "/../../../vendor/autoload.php");

use App\Classes\Setting;
use App\Classes\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

try {
  define("JWT_SECRET", "WHAT-IS-SECRET-KEY");
  define("JWT_ALGO", "HS512");
  $jwt = (isset($_COOKIE['jwt']) ? $_COOKIE['jwt'] : "");
  if (empty($jwt)) {
    header("Location: /");
    exit();
  }
  $decode = JWT::decode($jwt, new Key(JWT_SECRET, JWT_ALGO));
  $email = (isset($decode->data) ? $decode->data : "");
} catch (Exception $e) {
  $msg = $e->getMessage();
  if ($msg === "Expired token") {
    header("Location: /logout");
    exit;
  }
}

$USER = new User();
$Setting = new Setting();
$user = $USER->UserView([$email, $email]);
$system = $Setting->SystemView();
$services = $Setting->ServiceRead();

$user_authorize = explode(",", $user['authorize']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/vendor/twitter/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/vendor/fortawesome/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="/vendor/datatables/datatables/media/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/vendor/select2/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="/vendor/pnikolov/bootstrap-daterangepicker/css/daterangepicker.min.css">
  <link rel="stylesheet" href="/styles/css/main.css">
  <title><?php echo (!empty($system['name']) ? $system['name'] : "SystemName") ?></title>
</head>

<body>
  <div class="wrapper">
    <?php include_once(__DIR__ . "/sidebar.php") ?>

    <div id="content">
      <?php include_once(__DIR__ . "/navbar.php") ?>