<?php

namespace Super\Old;

class Senelis
{

  public static $posakis = 'Va va sakiau';

  public function __construct()
  {
    echo '<h2>Seku seku pasaka apie senelio kontruktoriu</h2>';
  }

  public function sektiPasaka()
  {
    echo '<h2>Seku seku pasaka</h2>';
    echo '<h3>!' . self::$posakis . '</h3>';
    echo '<h3>!!' . static::$posakis . '</h3>';
  }
}
