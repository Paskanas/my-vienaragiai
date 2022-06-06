<?php
class Grybas
{
  private $valgomas;
  private $sukirmijas;
  private $svoris;

  function __construct()
  {
    $this->valgomas = rand(1, 0) === 0 ? true : false;
    $this->sukirmijas = rand(1, 0) === 0 ? true : false;
    $this->svoris = rand(5, 45);
  }

  function get_grybasData()
  {
    return [$this->valgomas, $this->sukirmijas, $this->svoris];
  }
}
