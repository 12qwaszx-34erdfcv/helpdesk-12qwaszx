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

  public function MonthTh()
  {
    $data = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
    return $data;
  }

  public function MonthThName($month)
  {
    $data = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
    return $data[$month];
  }

  public function InputType()
  {
    $data = ["ตัวหนังสือ", "ตัวเลข", "ตัวเลือก", "วันที่"];
    return $data;
  }

  public function InputTypeName($type)
  {
    $data = ["", "ตัวหนังสือ", "ตัวเลข", "ตัวเลือก", "วันที่"];
    return $data[$type];
  }

  public function Letters($letter)
  {
    $data = ["", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW", "AX", "AY", "AZ", "BA", "BB", "BC", "BD", "BE", "BF", "BG", "BH", "BI", "BJ", "BK", "BL", "BM", "BN", "BO", "BP", "BQ", "BR", "BS", "BT", "BU", "BV", "BW", "BX", "BY", "BZ", "CA", "CB", "CC", "CD", "CE", "CF", "CG", "CH", "CI", "CJ", "CK", "CL", "CM", "CN", "CO", "CP", "CQ", "CR", "CS", "CT", "CU", "CV", "CW", "CX", "CY", "CZ", "DA", "DB", "DC", "DD", "DE", "DF", "DG", "DH", "DI", "DJ", "DK", "DL", "DM", "DN", "DO", "DP", "DQ", "DR", "DS", "DT", "DU", "DV", "DW", "DX", "DY", "DZ", "EA", "EB", "EC", "ED", "EE", "EF", "EG", "EH", "EI", "EJ", "EK", "EL", "EM", "EN", "EO", "EP", "EQ", "ER", "ES", "ET", "EU", "EV", "EW", "EX", "EY", "EZ"];
    return $data[$letter];
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
