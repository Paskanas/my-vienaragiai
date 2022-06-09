<?php

namespace Bankas;

use Bankas\Controllers\HomeControler;
use Bankas\Controllers\NotFoundController;
use Bankas\Validations\Messages;
use Bankas\Controllers\LoginController;

class App
{
  const DOMAIN = 'vienaragiubankas.lt';
  const APP = __DIR__ . '/../';
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

  public static function  getAuthName(): string
  {
    return $_SESSION['user'];
  }

  public static function authAdd(object $user)
  {
    $_SESSION['auth'] = 1;
    $_SESSION['user'] = $user->fullName;
  }

  public static function authRemove()
  {
    unset($_SESSION['auth']);
    unset($_SESSION['user']);
  }
  public static function auth()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === 1;
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
  public static function url(string $url = '')
  {
    return 'http://' . self::DOMAIN . '/' . $url;
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

    //Login



    if (count($uri) === 1) {
      if ($uri[0] === 'login' && $method === 'GET') {
        if (self::auth()) {
          return self::redirect('');
        }
        return (new LoginController)->showLogin();
      }
      if ($uri[0] === 'login' && $method === 'POST') {
        return (new LoginController)->doLogin();
      }
      if ($uri[0] === 'logout' && $method === 'POST') {
        return (new LoginController)->logout();
      }

      if ($uri[0] === '') {
        if ($method === 'GET') {
          if (!self::auth()) {
            return self::redirect('login');
          }
          return (new HomeControler)->index();
        } else if ($method === 'POST' && isset($_POST['logout'])) {
          self::authRemove();
          self::redirect('login');
        }
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
