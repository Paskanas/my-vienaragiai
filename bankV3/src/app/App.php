<?php

namespace Bankas;

use Bankas\Controllers\AccountListController;
use Bankas\Controllers\HomeController;
use Bankas\Controllers\NewAccountController;
use Bankas\Controllers\AddFundsController;
use Bankas\Controllers\AuthorizationController as Auth;
use Bankas\Controllers\DeductFundsController;
use Bankas\Controllers\FileController;
use Bankas\Controllers\NotFoundController;
use Bankas\Validations\Messages;
use Bankas\Controllers\UserController;

class App
{
  public static $db;
  private static $html;

  public static function start()
  {
    define('URL', 'http://manobankas.lt/');
    session_start();
    Messages::init();
    ob_start();
    $url = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($url);
    self::$db = new FileController('accounts');
    self::route($url);
    self::$html = ob_get_contents();
    ob_end_clean();
  }

  public static function sent()
  {
    echo self::$html;
  }

  public static function redirect(string $url = '', $id = '')
  {
    if ($url === 'accountList') {
      $url = 'pages/' . $url;
    } else if ($url === 'addFunds' || $url === 'deductFunds') {
      $url = 'pages/accountList/' . $url;
    }

    $link = URL . $url;
    if ($id) {
      $link .= '/' . $id;
    }
    header('Location: ' . $link);
  }

  private static function route(array $url)
  {
    $method = $_SERVER['REQUEST_METHOD'];
    if (count($url) === 1) {
      if ($url[0] === 'login') {
        if ($method === 'GET') {
          if (Auth::auth()) {
            return self::redirect('');
          }
          return (new UserController)->showLogin();
        }
        if ($method === 'POST') {
          if (($_POST['csrf'] ?? '') != Auth::csrf()) {
            Messages::add('Blogas portas', 'error');
            return (new NotFoundController)->index();
          }
          return (new UserController)->doLogin();
        }
      } else if ($url[0] === 'logout') {
        if ($method === 'POST') {
          return (new UserController)->logout();
        }
      } else if ($url[0] === '') {
        if (!Auth::auth()) {
          return self::redirect('login');
        }
        return (new HomeController)->index();
      } else if ($url[0] === 'newAccount') {
        if ($method === 'GET') {
          if (!Auth::auth()) {
            return self::redirect('login');
          }
          return (new NewAccountController)->index();
        }
        if ($method === 'POST') {
          if (($_POST['csrf'] ?? '') != Auth::csrf()) {
            Messages::add('Blogas portas', 'error');
            return (new NotFoundController)->index();
          }
          return (new NewAccountController)->post();
        }
      }
      return (new NotFoundController)->index();
    } else if (count($url) >= 2 && count($url) <= 4) {
      if ($url[0] === 'pages') {
        if ($url[1] === 'accountList') {
          if (count($url) === 2) {
            if ($method === 'GET') {
              if (!Auth::auth()) {
                return self::redirect('login');
              }
              return (new AccountListController)->index();
            } else if ($method === 'POST') {
              if (($_POST['csrf'] ?? '') != Auth::csrf()) {
                Messages::add('Blogas portas', 'error');
                return (new NotFoundController)->index();
              }
              return (new AccountListController)->post();
            }
          } else if (count($url) === 4 && isset($url[3])) {
            if ($url[2] === 'addFunds') {
              if ($method === 'GET') {
                if (!Auth::auth()) {
                  return self::redirect('login');
                }
                return (new AddFundsController)->index($url[3]);
              }
              if ($method === 'POST') {
                if (($_POST['csrf'] ?? '') != Auth::csrf()) {
                  Messages::add('Blogas portas', 'error');
                  return (new NotFoundController)->index();
                }
                return (new AddFundsController)->post($url[3]);
              }
            }
            if ($url[2] === 'deductFunds') {
              if ($method === 'GET') {
                if (!Auth::auth()) {
                  return self::redirect('login');
                }
                return (new DeductFundsController)->index($url[3]);
              }
              if ($method === 'POST') {
                if (($_POST['csrf'] ?? '') != Auth::csrf()) {
                  Messages::add('Blogas portas', 'error');
                  return (new NotFoundController)->index();
                }
                return (new DeductFundsController)->post($url[3]);
              }
            }
            return (new NotFoundController)->index();
          } else {
            return (new NotFoundController)->index();
          }
        } else {
          return (new NotFoundController)->index();
        }
      } else {
        return (new NotFoundController)->index();
      }
    } else {
      return (new NotFoundController)->index();
    }
  }

  public static function view(string $fileName, array $data = []): string
  {
    extract($data);
    return require __DIR__ . '/../views/' . $fileName . '.php';
  }
}
