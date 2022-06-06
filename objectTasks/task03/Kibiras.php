<?php
class Kibiras2
{
  public $akmenuKiekis;
  static private $akmenuKiekisVisoseKibiruose;

  function set_pridetiDaugAkmenu($akmenuKiekis)
  {
    $this->akmenuKiekis += $akmenuKiekis;
    self::$akmenuKiekisVisoseKibiruose += $akmenuKiekis;
  }
  function set_prideti1Akmeni()
  {
    $this->akmenuKiekis++;
    self::$akmenuKiekisVisoseKibiruose++;
  }

  function get_kiekPririnkauAkmenu()
  {
    return $this->akmenuKiekis;
  }
  static function get_visiAkmenys()
  {
    return self::$akmenuKiekisVisoseKibiruose;
  }
}
