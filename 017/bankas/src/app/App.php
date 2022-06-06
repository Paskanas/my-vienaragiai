<?php

namespace Bankas;

use Bankas\Controllers\HomeControler;

class App
{
  public static function start()
  {
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($uri);
    self::route($uri);
    // print_r($uri);
  }

  private static function route(array $uri)
  {
    if (count($uri) === 1 && $uri[0] === '') {
      return (new HomeControler)->index();
    } else {
      echo 'Ne';
      echo '<br>';
    }
  }
}
