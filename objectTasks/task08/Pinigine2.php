<?php
class Pinigine2
{
  private $popieriniaiPinigai;
  private $metaliniaiPinigai;

  function set_ideti($kiekis)
  {
    if ($kiekis > 2) {
      $this->popieriniaiPinigai += $kiekis;
    } else {
      $this->metaliniaiPinigai += $kiekis;
    }
  }
  function get_skaiciuoti()
  {
    return $this->popieriniaiPinigai + $this->metaliniaiPinigai;
  }
  function get_popieriniai()
  {
    return $this->popieriniaiPinigai;
  }
  function get_metaliniai()
  {
    return $this->metaliniaiPinigai;
  }
}
