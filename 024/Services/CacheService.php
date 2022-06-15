<?php

class CacheService
{

  private $time;
  private $expirationTimeS = 30;

  public function __construct()
  {
    $this->time = time();
  }

  private function isValid($dataCacheTime)
  {
    echo '<br>';
    echo $this->time;
    echo '<br>';
    echo $dataCacheTime;
    echo '<br>';
    echo $this->expirationTimeS;
    echo '<br>';
    return $this->time - $dataCacheTime < $this->expirationTimeS;
  }

  private function getCacheTime()
  {
    return $_SESSION['cacheTime'] ?? 0;
  }

  private function write($data)
  {
    $_SESSION['cacheData'] = $data;
    echo '<br>';
    echo '$this->time';
    echo '<br>';
    echo $this->time;
    echo '<br>';
    $_SESSION['cacheTime'][] = $this->time;
  }

  private function read()
  {
    if (isset($_SESSION['cacheData'])) {
      return $_SESSION['cacheData'];
    }
    return null;
  }

  public function get()
  {
    $dataCachedOn = $this->getCacheTime();
    echo $this->getCacheTime();
    if (!$this->isValid($dataCachedOn)) {
      return null;
    }
    return $this->read();
  }

  public function set($data)
  {
    $this->write($data);
  }
}
