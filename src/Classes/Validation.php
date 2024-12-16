<?php

namespace App\Classes;

class Validation
{
  public function Alert($alert, $text, $url = null)
  {
    $_SESSION['alert'] = $alert;
    $_SESSION['text'] = $text;
    if (!empty($url)) {
      die(header("Location: {$url}"));
    }
  }

  public function Input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  public function RandomPassword()
  {
    $random = "";
    for ($i = 0; $i < 6; $i++) {
      $random .= rand(0, 9);
    }

    return $random;
  }

  public function SendPassword($password)
  {
    $text = "
    <html>
    <head>
      <title>รหัสผ่าน เพื่อเข้าสู่ระบบ</title>
      <style>
        body { font-family: Arial, sans-serif; }
        .password-box { font-size: 22px; font-weight: bold; padding: 10px; background-color: #e0e0e0; border-radius: 5px; }
      </style>
    </head>
    <body>
      <p>รหัสผ่านของคุณ</p>
      <div class='password-box'>{$password}</div>
      <p>แสดงความนับถือ</p>
    </body>
    </html>
    ";
    return $text;
  }
}
