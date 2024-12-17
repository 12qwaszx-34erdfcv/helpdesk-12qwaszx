<?php

namespace App\Classes;

use PDO;

class User
{
  public $dbcon;

  public function __construct()
  {
    $database = new Database();
    $this->dbcon = $database->getConnection();
  }

  public function UserCount($data)
  {
    $sql = "SELECT COUNT(*) FROM example.user a WHERE a.email = ? LIMIT 1";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetchColumn();
  }

  public function UserCreate($data)
  {
    $sql = "INSERT INTO example.user(`uuid`, `firstname`, `lastname`, `email`, `contact`) VALUES(uuid(),?,?,?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }


  public function UserView($data)
  {
    $sql = "SELECT *,CONCAT(a.firstname,' ',a.lastname) fullname
    FROM example.user a
    WHERE (a.uuid = ? OR a.email = ?)";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetch();
  }

  public function UserRead()
  {
    $sql = "SELECT *,CONCAT(a.firstname,' ',a.lastname) fullname,
    IF(a.status = 1,'ใช้งาน','ระงับการใช้งาน') status_name,
    IF(a.level = 1,'ผู้ใช้งาน','ผู้ดูแลระบบ') level_name
    FROM example.user a";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function UserUpdate($data)
  {
    $sql = "UPDATE example.user SET
    `firstname` = ?,
    `lastname` = ?,
    `email` = ?,
    `contact` = ?,
    `level` = ?,
    `status` = ?,
    `updated` = NOW()
    WHERE `id` = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function InsertPassword($data)
  {
    $sql = "INSERT INTO example.login(`email`, `random`) VALUES(?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function UpdatePassword($data)
  {
    $sql = "UPDATE example.login SET
    login = 2
    WHERE `email` = ?
    AND `random` = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function LastPassword($data)
  {
    $sql = "SELECT random FROM example.login a 
    WHERE a.email = ? AND a.login = 1 AND DATE(a.created) = DATE(NOW()) ORDER BY a.id DESC LIMIT 1";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    $row = $stmt->fetch();
    return (!empty($row['random']) ? $row['random'] : "");
  }

  public function UserData()
  {
    $sql = "SELECT COUNT(*) FROM example.user WHERE status IN (1,2)";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    $total = $stmt->fetchColumn();

    $column = ["a.id", "a.code", "a.asset_code", "a.name", "d.name", "b.name", "c.name"];

    $keyword = (isset($_POST['search']['value']) ? trim($_POST['search']['value']) : '');
    $filter_order = (isset($_POST['order']) ? $_POST['order'] : '');
    $order_column = (isset($_POST['order']['0']['column']) ? $_POST['order']['0']['column'] : '');
    $order_dir = (isset($_POST['order']['0']['dir']) ? $_POST['order']['0']['dir'] : '');
    $limit_start = (isset($_POST['start']) ? $_POST['start'] : '');
    $limit_length = (isset($_POST['length']) ? $_POST['length'] : '');
    $draw = (isset($_POST['draw']) ? $_POST['draw'] : '');

    $sql = "SELECT *,CONCAT(a.firstname,' ',a.lastname) fullname,
    IF(a.status = 1,'ใช้งาน','ระงับการใช้งาน') status_name,
    IF(a.status = 1,'success','danger') status_color,
    IF(a.level = 1,'ผู้ใช้งาน','ผู้ดูแลระบบ') level_name,
    IF(a.level = 1,'success','danger') level_color
    FROM example.user a ";

    if (!empty($keyword)) {
      $sql .= " WHERE (a.firstname LIKE '%{$keyword}%' OR a.lastname LIKE '%{$keyword}%' OR a.email LIKE '%{$keyword}%' OR a.contact LIKE '%{$keyword}%') ";
    }

    if ($filter_order) {
      $sql .= " ORDER BY {$column[$order_column]} {$order_dir} ";
    } else {
      $sql .= " ORDER BY a.status ASC, a.level DESC, a.firstname ASC ";
    }

    $sql2 = '';
    if ($limit_length) {
      $sql2 .= "LIMIT {$limit_start}, {$limit_length}";
    }

    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    $filter = $stmt->rowCount();
    $stmt = $this->dbcon->prepare($sql . $sql2);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $data = [];
    foreach ($result as $row) {
      $action = "<a href='/setting/user-view/{$row['uuid']}' class='badge badge-{$row['status_color']} font-weight-light'>{$row['status_name']}</a> <a href='javascript:void(0)' class='badge badge-danger font-weight-light btn-delete' id='{$row['uuid']}'>ลบ</a>";
      $level = "<span class='badge badge-{$row['level_color']} font-weight-light'>{$row['level_name']}</span>";
      $data[] = [
        $action,
        $level,
        $row['email'],
        $row['firstname'],
        $row['lastname'],
        str_replace("\n", "<br>", $row['contact'])
      ];
    }

    $output = [
      "draw"    => $draw,
      "recordsTotal"  =>  $total,
      "recordsFiltered" => $filter,
      "data"    => $data
    ];
    return $output;
  }
}
