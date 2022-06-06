<?php
class Tenisininkas
{
  private $vardas;
  private $kamuoliukas = false;
  private static $zaidejas1;
  private static $zaidejas2;

  public function __construct($vardas)
  {
    $this->vardas = $vardas;
    if ((self::$zaidejas1->kamuoliukas ?? 'tuscia') === 'tuscia') {
      $this->kamuoliukas = rand(0, 1) === 0 ? true : false;
    } else {
      $this->kamuoliukas = !self::$zaidejas1->kamuoliukas;
    }

    if (!self::$zaidejas1) {
      self::$zaidejas1 = $this;
    } else {
      self::$zaidejas2 = $this;
    }
  }

  public function  arTuriKamuoliuka()
  {
    if ($this->kamuoliukas) {
      return $this->vardas . ': Turiu';
    }
    return $this->vardas . ': Neturiu';
  }

  public function perduotiKamuoliuka()
  {
    if ($this->kamuoliukas) {
      if ((self::$zaidejas1->kamuoliukas ?? false)) {
        self::$zaidejas1->kamuoliukas = false;
        self::$zaidejas2->kamuoliukas = true;
      } else {
        self::$zaidejas2->kamuoliukas = false;
        self::$zaidejas1->kamuoliukas = true;
      }
      echo '<br>';
      echo '<h1>Perduotas kamuoliukas</h1>';
      echo '<br>';
      echo '<br>';
    } else {
      echo '<h1>Neturiu kamuoliuko</h1>';
    }
  }

  public static function zaidimoPradzia()
  {
    if (!self::$zaidejas1 || !self::$zaidejas2) {
      echo '<h1>Negalime zaisti</h1>';
    }
  }
}
