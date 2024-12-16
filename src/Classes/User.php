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

  public function UserView($data)
  {
    $sql = "SELECT *
    FROM example.user a
    WHERE a.email = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetch();
  }

  public function UserRead()
  {
    $sql = "SELECT * FROM example.user a";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function UserUpdate($data)
  {
    $sql = "UPDATE example.user SET
    `name` = ?,
    `contact` = ?,
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
}
