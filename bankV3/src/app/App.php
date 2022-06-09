<?php

namespace Bankas;

use Bankas\Controllers\AccountListController;
use Bankas\Controllers\HomeController;
use Bankas\Controllers\NewAccountController;
use Bankas\Controllers\AddFundsController;
use Bankas\Controllers\DeductFundsController;
use Bankas\Validations\Messages;

class App
{

  const DOMAIN = 'manobankas.lt';
  public static function start()
  {
    session_start();
    Messages::init();
    $url = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($url);
    self::route($url);
    echo '<br>';
    print_r($url);
    echo '<br>';
  }

  public static function redirect(string $url = '', $id = '')
  {
    if ($url === 'accountList') {
      $url = 'pages/' . $url;
    } else if ($url === 'addFunds' || $url === 'deductFunds') {
      $url = 'pages/accountList/' . $url;
    }

    header('Location: http://' . self::DOMAIN . '/' . $url . '/' . $id);
  }

  private static function route(array $url)
  {
    $method = $_SERVER['REQUEST_METHOD'];
    if (count($url) === 1) {
      if ($url[0] === '') {
        return (new HomeController)->index();
      } else {
        echo 'Kita';
      }
    } else if (count($url) >= 2) {
      if ($url[0] === 'pages') {
        if ($url[1] === 'accountList') {
          if (isset($url[2])) {
            if (isset($url[3])) {
              if ($url[2] === 'addFunds') {
                if ($method === 'GET') {
                  return (new AddFundsController)->index($url[3]);
                } else if ($method === 'POST') {
                  return (new AddFundsController)->post($url[3]);
                }
              }
              if ($url[2] === 'deductFunds') {
                return (new DeductFundsController)->index($url[3]);
              }
            } //else rodyti 404 page
            if ($method === 'GET') {
              return (new AccountListController)->index();
            } else if ($method === 'POST') {
              return (new AccountListController)->post();
            }
          } else {
            if ($method === 'GET') {
              return (new AccountListController)->index();
            } else if ($method === 'POST') {
              return (new AccountListController)->post();
            }
          }
        }
        if ($url[1] === 'newAccount') {
          return (new NewAccountController)->index();
        }
      }
    } else {
      echo 'Kita';
    }
  }

  public static function view(string $name, array $data = []): string
  {
    echo __DIR__ . '/../views/' . $name . '.php';
    extract($data);
    define('URL', 'http://manobankas.lt/');
    return require __DIR__ . '/../views/' . $name . '.php';
  }
}
