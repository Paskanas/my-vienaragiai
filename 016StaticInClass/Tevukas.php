<?php

namespace Meska\Lokys;

// use Super\Old\Senelis;
use Super\Old\Senelis;

class Tevukas extends Senelis
{
  public static $posakis = 'bla bla bla';

  public function __construct()
  {
    parent::__construct();
    echo '<h2>Seku seku pasaka apie tevuko kontruktoriu</h2>';
  }

  public function tvarka()
  {
    echo '<h2>Darom tvarka</h2>';
    echo '<h3>' . self::$posakis . '</h3>';
  }
}
