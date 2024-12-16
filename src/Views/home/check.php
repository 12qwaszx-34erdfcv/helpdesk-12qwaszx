<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");
include_once(__DIR__ . "/../../../vendor/autoload.php");

$email = (isset($_SESSION['email']) ? $_SESSION['email'] : "");
if (empty($email)) {
  header("Location: /");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/css/main.css">
  <link rel="stylesheet" href="/vendor/twitter/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/vendor/fortawesome/font-awesome/css/all.min.css">
  <title>เข้าสู่ระบบ</title>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg" style="width: 30rem;">
      <div class="card-body">
        <h4 class="card-title text-center mb-4">เข้าสู่ระบบ</h4>
        <form action="/check" method="POST" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="password" class="form-label">อีเมล</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" readonly>
            <div class="invalid-feedback">
              กรุณากรอกข้อมูล!
            </div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">รหัสผ่าน</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required>
            <div class="invalid-feedback">
              กรุณากรอกข้อมูล!
            </div>
          </div>
          <button type="submit" class="btn btn-success w-100 mb-2">
            <i class="fa fa-check pr-3"></i>เข้าสู่ระบบ
          </button>
          <a href="/" class="btn btn-danger w-100 mb-2">
            <i class="fa fa-arrow-left pr-3"></i>ขอรหัสผ่านใหม่
          </a>
        </form>
      </div>
    </div>
  </div>

  <?php if (!empty($_SESSION['alert']) && !empty($_SESSION['text'])) : ?>
    <div style="position: absolute; top: 120px; right: 0; width: 30rem;">
      <div class="toast hide" data-delay="5000">
        <div class="toast-header bg-<?php echo $_SESSION['alert'] ?>">
          <strong class="mr-auto text-white">แจ้งเตือน</strong>
          <button type="button" class="ml-5 close" data-dismiss="toast">
            <i class="fa fa-times text-white"></i>
          </button>
        </div>
        <div class="toast-body">
          <h5 class="text-<?php echo $_SESSION['alert'] ?>"><?php echo $_SESSION['text'] ?></h5>
        </div>
      </div>
    </div>
  <?php
  endif;
  unset($_SESSION['alert'], $_SESSION['text']);
  ?>
  <script src="/vendor/components/jquery/jquery.min.js"></script>
  <script src="/vendor/twitter/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/styles/javascript/main.js"></script>
</body>

</html>