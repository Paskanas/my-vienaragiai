<?php

namespace Bankas\Controllers;

use App\DB\DataBase;

class FileController implements DataBase
{
  private $data;
  private $path;
  private $pathId;

  public function __construct($file)
  {
    $this->path = __DIR__ . '/../../data/' . $file . '.json';
    $this->pathId = __DIR__ . '/../../data/' . $file . 'Id.json';
    self::createEmpty();
    if (!$this->data) {
      if (file_exists($this->path)) {
        $this->data = json_decode(file_get_contents($this->path), true);
      }
    }
  }

  public function __destruct()
  {
    if ($this->data === null) {
      return;
    }
    file_put_contents($this->path, json_encode($this->data));
  }

  public function maxId()
  {
    $id = json_decode(file_get_contents($this->pathId));
    return $id;
  }

  private function newId()
  {
    $id = $this->maxId();
    $id++;
    file_put_contents($this->pathId, json_encode($id));
    return $id;
  }

  public function create(array $userData): void
  {
    $this->data[] = [...$userData, 'id' => $this->newId()];
  }

  public function update(int $userId, array $userData): void
  {
    foreach ($this->data as &$account) {
      if ($account['id'] === $userId) {
        $account = $userData;
      }
    }
  }

  public function delete(int $userId): void
  {
    foreach ($this->data as $key => $account) {
      if ($userId === $account['id']) {
        unset($this->data[$key]);
        $this->data = array_values($this->data);
        break;
      }
    }
  }

  public function show(int $userId): array
  {
    foreach ($this->data as $account) {
      if ($account['id'] == $userId) {
        return $account;
        break;
      }
    }
    return [];
  }

  public function showAll(): array
  {
    return $this->data;
  }

  private function createEmpty(): void
  {
    if (!file_exists($this->path)) {
      file_put_contents($this->path, json_encode([]));
      file_put_contents($this->pathId, json_encode(0));
    }
  }

  public function sort(): void
  {
    usort($this->data, function ($item1, $item2) {
      return $item1['surname'] <=> $item2['surname'];
    });
  }

  public function getRecordDataByName(int $userId, string $name)
  {
    $record = $this->show($userId);
    return $record[$name];
  }
}
