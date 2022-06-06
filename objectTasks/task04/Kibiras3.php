<?php
class Kibiras3
{
  public $akmenuKiekis;

  function set_pridetiDaugAkmenu($akmenuKiekis)
  {
    $this->akmenuKiekis += $akmenuKiekis;
  }
  function set_prideti1Akmeni()
  {
    $this->akmenuKiekis++;
  }

  function get_kiekPririnkauAkmenu()
  {
    return $this->akmenuKiekis;
  }
}
