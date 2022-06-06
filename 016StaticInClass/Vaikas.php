<?php

namespace Meska\Lokys;

use Meska\Lokys\Tevukas;

class Vaikas extends Tevukas
{

  public static $posakis = 'MEEEEEEE';

  public function __construct()
  {
    // parent::__construct();
    echo '<h2>Seku seku pasaka apie vaiko kontruktoriu</h2>';
  }

  public function betvarke()
  {
    echo '<h3>Visiska betvarke</h3>';
  }

  public function sektiPasaka()
  {
    echo '<h2>Scrolinu tictok</h2>';
    echo '<h3>' . self::$posakis . '</h3>';
    // echo '<h3>' . static::$posakis . '</h3>';
  }
}
