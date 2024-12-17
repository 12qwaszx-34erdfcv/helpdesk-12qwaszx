<?php

namespace App\Classes;

use PDO;

class Setting
{
  public $dbcon;

  public function __construct()
  {
    $database = new Database();
    $this->dbcon = $database->getConnection();
  }

  public function SystemView()
  {
    $sql = "SELECT `name`, `email`, `email_name`, `email_password`
    FROM example.setting_system a
    WHERE a.id = 1";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetch();
  }

  public function SystemUpdate($data)
  {
    $sql = "UPDATE example.setting_system SET
    `name` = ?,
    `email` = ?,
    `email_name` = ?,
    `email_password` = ?,
    `updated` = NOW()
    WHERE `id` = 1";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function ServiceCount($data)
  {
    $sql = "SELECT COUNT(*) FROM example.setting_service a WHERE a.name = ? LIMIT 1";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetchColumn();
  }

  public function ServiceCreate($data)
  {
    $sql = "INSERT INTO example.setting_service(`uuid`, `sequence`, `name`, `link`) VALUES(uuid(),?,?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function ServiceUpdate($data)
  {
    $sql = "UPDATE example.setting_service SET 
    `sequence` = ?,
    `name` = ?,
    `link` = ?,
    `updated` = NOW()
    WHERE `uuid` = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function ServiceRead()
  {
    $sql = "SELECT * FROM example.setting_service WHERE `status` = 1 ORDER BY `sequence` ASC";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function ServiceDelete($data)
  {
    $sql = "UPDATE example.setting_service SET
    `status` = 0,
    `updated` = NOW()
    WHERE `uuid` = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function AuthorizeUpdate($data)
  {
    $sql = "UPDATE example.user SET 
    `authorize` = ?,
    `updated` = NOW()
    WHERE `id` = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }
}
