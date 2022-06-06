<?php

class Stikline
{

  public static $visoPilta;
  public $turis;

  public static function valio()
  {
    echo '<h1>Valio</h1>';
  }

  public static function createObj()
  {
    return new self;
  }

  public function __construct()
  {
    $this->turis = rand(100, 200);
    self::$visoPilta += $this->turis;
  }

  public function kiek()
  {
    return '<br>Viso ipilta ' . self::$visoPilta . 'ml</br>';
  }
}
