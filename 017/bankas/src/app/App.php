<?php

namespace Bankas;

use Bankas\Controllers\HomeControler;
use Bankas\Controllers\NotFoundController;
use Bankas\Validations\Messages;

class App
{
  const DOMAIN = 'vienaragiubankas.lt';
  private static $html;
  public static function start()
  {
    session_start();
    Messages::init();
    ob_start();
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($uri);

    self::route($uri);
    self::$html = ob_get_contents();
    ob_end_clean();
    // print_r($uri);
  }

  public static function sent()
  {
    echo self::$html;
  }

  public static function view(string $name, array $data = [])
  {
    extract($data);

    require __DIR__ . '/../views/' . $name . '.php';
  }

  public static function json(array $data = [])
  {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
  }

  public static function redirect(string $url = '')
  {
    header('Location: http://' . self::DOMAIN . '/' . $url);
  }

  private static function route(array $uri)
  {
    // if (count($uri) === 1 && $uri[0] === '') {
    //   return (new HomeControler)->index();
    // } else if (count($uri) === 1 && $uri[0] !== '') {
    //   return (new NotFoundController)->index();
    // } else {
    //   echo 'Ne';
    //   echo '<br>';
    // }
    $method = $_SERVER['REQUEST_METHOD'];
    if (count($uri) === 1) {
      if ($uri[0] === '') {
        return (new HomeControler)->index();
      }
      if ($uri[0] === 'form' && $method === 'GET') {
        return (new HomeControler)->form();
      }
      if ($uri[0] === 'form' && $method === 'POST') {
        return (new HomeControler)->doForm();
      }
      if ($uri[0] === 'json' && $method === 'GET') {
        return (new HomeControler)->indexJson();
      }
      return (new NotFoundController)->index();
    } else if (count($uri) === 2) {
      if ($uri[0] === 'get-it' && $method === 'GET') {
        return (new HomeControler)->getIt($uri[1]);
      }
    } else {
      return (new NotFoundController)->index();
    }
  }
}
