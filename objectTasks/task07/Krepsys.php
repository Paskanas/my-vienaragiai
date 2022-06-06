<?php
class Krepsys
{
  const dydis = 500;
  private $uzimtaVieta = 0;
  function put_krepsys($svoris)
  {
    $this->uzimtaVieta += $svoris;
    if ($this->uzimtaVieta > self::dydis) {
      $this->uzimtaVieta = self::dydis;
    }
  }

  function get_krepsys()
  {
    return $this->uzimtaVieta;
  }
}
