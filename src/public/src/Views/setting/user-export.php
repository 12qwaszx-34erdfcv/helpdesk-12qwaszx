<?php
require_once(__DIR__ . "/../../../vendor/autoload.php");

use App\Classes\User;
use App\Classes\Validation;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$USER = new User();
$VALIDATION = new Validation();
$SPREADSHEET = new Spreadsheet();
$WRITER = new Xlsx($SPREADSHEET);

$result = $USER->UserRead();

$data = [];
foreach ($result as $row) {
  $data[] = [
    $row['email'],
    $row['firstname'],
    $row['lastname'],
    $row['contact'],
    $row['level_name'],
    $row['status_name'],
  ];
}

array_walk_recursive($result, "htmldecode");

function htmldecode(&$item, $key)
{
  $item = html_entity_decode($item, ENT_COMPAT, "UTF-8");
}

$columns = ["อีเมล", "ชื่อ", "นามสกุล", "ติดต่อ", "ระดับ", "สถานะ"];

$letters = [];
for ($i = "A"; $i != $VALIDATION->Letters(COUNT($columns) + 1); $i++) {
  $letters[] = $i;
}

$columns = array_combine($letters, $columns);

ob_start();
$date = date('Ymd');
$filename = $date . "_users.csv";
header("Content-Encoding: UTF-8");
header("Content-Type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename={$filename}");
ob_end_clean();

$output = fopen("php://output", "w");
fputs($output, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
fputcsv($output, $columns);

foreach ($data as $dt) {
  fputcsv($output, $dt);
}

fclose($output);
die();
