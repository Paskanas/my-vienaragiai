<?php

namespace Bankas\Controllers;

use PDO;
use App\DB\DataBase;

class DBController implements DataBase
{

  private $data;
  private $table;
  public function __construct($table)
  {
    $this->table = $table;
    $host = '127.0.0.1';
    $db   = 'bank';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    // try {
    $this->data = new PDO($dsn, $user, $pass, $options);
    // } catch (\PDOException $e) {
    //      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    // }

  }

  // public function __destruct()
  // {
  //   $stmt->execute([$this->table,...$userData]);
  // }

  public function create(array $userData): void
  {
    if (isset($userData['csrf'])) {
      unset($userData['csrf']);
    }

    $sql = 'insert into ' . $this->table . ' (';
    $counter = 0;
    foreach ($userData as $key => $value) {
      if ($counter === 0) {
        $sql .= $key;
      } else {
        $sql .= ', ' . $key;
      }
      $counter++;
    }
    $sql .= ') values (';
    $counter = 0;
    foreach ($userData as $key => $value) {
      if ($counter === 0) {
        $sql .= ':' . $key;
      } else {
        $sql .= ', ' . ':' . $key;
      }
      $counter++;
    }
    $sql .= ')';
    $stmt = $this->data->prepare($sql);
    $stmt->execute($userData);
  }

  public function update(int $userId, array $userData): void
  {
    $counter = 0;
    $sql = 'update ' . $this->table . ' set ';
    foreach ($userData as $key => $value) {
      if ($key === 'id') {
        continue;
      }
      if (gettype($value) === 'string') {
        if ($counter === 0) {
          $sql .= $key . " = '" . $value . "'";
        } else {
          $sql .= ', ' . $key . " = '" . $value . "'";
        }
      } else if (gettype($value) === 'integer') {
        if ($counter === 0) {
          $sql .= $key . " = " . $value;
        } else {
          $sql .= ', ' . $key . " = " . $value;
        }
      }
      $counter++;
    }
    $sql .= ' where id = ' . $userData['id'];
    $stmt = $this->data->prepare($sql);
    $stmt->execute();
  }

  public function delete(int $userId): void
  {
    $sql = "delete from " . $this->table . " where id = ?";
    $stmt = $this->data->prepare($sql);
    $stmt->execute([$userId]);
  }

  public function show(int $userId): array
  {
    $sql = "select * from " . $this->table . " where id = " . $userId;
    $stmt = $this->data->query($sql);
    $gotData = $stmt->fetch();
    if ($gotData) {
      return $gotData;
    }
    return [];
  }

  public function showAll(): array
  {
    $sql = 'select * from ' . $this->table . ' order by surname';
    $stmt = $this->data->query($sql);
    $gotData = $stmt->fetchAll();
    if ($gotData) {
      return $gotData;
    }
    return [];
  }

  // public function sort(): void
  // {
  //   $sql = 'select * from ' . $this->table.' order by surname';
  //   echo $sql;
  //   $stmt = $this->data->query($sql);
  //   $gotData = $stmt->fetchAll();
  //   if ($gotData) {
  //     print_r($gotData);
  //     return $gotData;
  //   }
  //   return [];
  // }

  public function getRecordDataByName(int $userId, string $name)
  {
    // $record = $this->show($userId);
    // return $record[$name];

    $sql = "select " . $name . " from " . $this->table . " where id = " . $userId;
    $stmt = $this->data->query($sql);
    $gotData = $stmt->fetch();
    if ($gotData) {
      return $gotData[$name];
    }
    return [];
  }

  public function maxId()
  {

    // $id = json_decode(file_get_contents($this->pathId));
    // return $id;
    $sql = "select max(id) as max from " . $this->table;
    $stmt = $this->data->query($sql);
    $gotData = $stmt->fetch();
    if ($gotData) {
      return $gotData['max'];
    }
    return [];
  }
}
