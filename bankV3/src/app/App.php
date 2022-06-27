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
use Bankas\Validations\ValidateAccount;

class App
{
  public static $db;
  private static $html;

  public static function start()
  {
    define('URL', 'http://manobankas.lt/');
    session_start();
    Messages::init();
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
      header('Access-Control-Allow-Origin: *');
      header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
      header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
      die;
    }
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

  public static function json($data = [])
  {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");

    echo json_encode($data);
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

  private static function getUser()
  {
    $token = apache_request_headers()['Authorization'] ?? '';
    if ($token === '') {
      return null;
    }
    $db = new FileController('users');
    $users = $db->showAll();
    foreach ($users as $user) {
      if ($user['session'] == $token) {
        return $user;
      }
    }
    return null;
  }

  private static function route(array $url)
  {
    $method = $_SERVER['REQUEST_METHOD'];
    // if ($method == 'OPTIONS') {
    //   header('Access-Control-Allow-Origin: *');
    //   header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
    //   header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
    //   die;
    // }
    if (count($url) > 0 && $url[0] === 'api') {
      // header('Content-Type: application/json');
      // header('Access-Control-Allow-Origin: *');
      // header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
      // echo json_encode($data);
      if (count($url) === 2) {
        if ($url[1] == 'login') {
          $rawData = file_get_contents("php://input");
          $data = json_decode($rawData, 1);
          $db = new FileController('users');
          $users = $db->showAll();

          foreach ($users as $user) {
            if (
              $user['name']
              != $data['name'] ||
              $user['password'] !=
              md5($data['password'])
            ) {
              continue;
            }
            $token = md5(time() . rand(0, 10000));
            $user['session'] = $token;
            $db->update($user['id'], $user);
            // echo json_encode(['token' => $token]);
            self::json(['token' => $token]);
            die;
          }
          echo json_encode(['msg' => 'error']);
        }
        if ($url[1] == 'auth') {
          $user = self::getUser();
          if ($user) {
            // echo json_encode(['user' => $user]);
            echo self::json(['user' => $user]);
          } else {
            // echo json_encode(['msg' => 'Not logged']);
            echo self::json(['msg' => 'Not logged']);
          }
        }

        if ($url[1] === 'home' && $method === 'GET') {
          self::json(self::$db->showAll());
        }

        if ($url[1] === 'home' && $method === 'POST') {
          $rawData = file_get_contents("php://input");
          $data = json_decode($rawData, 1);
          $iban = (new NewAccountController)->generateIban();

          $validation = ValidateAccount::validateIdentityCode2($data['identityCode'], $data['name'], $data['surname']);
          if ($validation[1] === 'message') {
            self::$db->create([...$data, 'bankAccount' => $iban, 'balance' => 0]);
          }
          self::json($validation);
        }

        if ($url[1] === 'newIban' && $method === 'GET') {
          $iban = (new NewAccountController)->generateIban();
          self::json($iban);
        }
      }
      if (count($url) === 3) {
        if ($url[1] === 'home' && $method === 'DELETE') {
          $data = self::$db->show($url[2]);
          $validation = ValidateAccount::validateDelete2($data['balance']);
          if ($validation[1] === 'message') {
            self::$db->delete($url[2]);
          }
          self::json($validation);
        }
        if ($url[1] === 'home' && $method === 'PUT') {
          $rawData = file_get_contents("php://input");
          $data = json_decode($rawData, 1);
          if ($data['method'] === 'add') {
            $validation = ValidateAccount::validateAdd2($data['sum']);
            if ($validation[1] === 'message') {
              $data['balance'] += $data['sum'];
            }
          }
          if ($data['method'] === 'deduct') {
            $validation = ValidateAccount::validateSubstract2($data['sum'], $data['balance']);
            if ($validation[1] === 'message') {
              $data['balance'] -= $data['sum'];
            }
          }
          if ($validation[1] === 'message') {
            unset($data['sum']);
            unset($data['method']);
            self::$db->update($url[2], $data);
          }
          self::json($validation);
        }
      }
    } else {
      if (count($url) === 1) {
        if ($url[0] === 'login') {
          if ($method === 'GET') {
            if (Auth::auth()) {
              self::redirect('');
            }
            (new UserController)->showLogin();
          }
          if ($method === 'POST') {
            if (($_POST['csrf'] ?? '') != Auth::csrf()) {
              Messages::add('Blogas portas', 'error');
              (new NotFoundController)->index();
            }
            (new UserController)->doLogin();
          }
        } else if ($url[0] === 'logout') {
          if ($method === 'POST') {
            (new UserController)->logout();
          }
        } else if ($url[0] === '') {
          if (!Auth::auth()) {
            self::redirect('login');
          }
          (new HomeController)->index();
        } else if ($url[0] === 'newAccount') {
          if ($method === 'GET') {
            if (!Auth::auth()) {
              self::redirect('login');
            }
            (new NewAccountController)->index();
          }
          if ($method === 'POST') {
            if (($_POST['csrf'] ?? '') != Auth::csrf()) {
              Messages::add('Blogas portas', 'error');
              (new NotFoundController)->index();
            }
            (new NewAccountController)->post();
          }
        }
        (new NotFoundController)->index();
      } else if (count($url) >= 2 && count($url) <= 4) {
        if ($url[0] === 'pages') {
          if ($url[1] === 'accountList') {
            if (count($url) === 2) {
              if ($method === 'GET') {
                if (!Auth::auth()) {
                  self::redirect('login');
                }
                (new AccountListController)->index();
              } else if ($method === 'POST') {
                if (($_POST['csrf'] ?? '') != Auth::csrf()) {
                  Messages::add('Blogas portas', 'error');
                  (new NotFoundController)->index();
                }
                (new AccountListController)->post();
              }
            } else if (count($url) === 4 && isset($url[3])) {
              if ($url[2] === 'addFunds') {
                if ($method === 'GET') {
                  if (!Auth::auth()) {
                    self::redirect('login');
                  }
                  (new AddFundsController)->index($url[3]);
                }
                if ($method === 'POST') {
                  if (($_POST['csrf'] ?? '') != Auth::csrf()) {
                    Messages::add('Blogas portas', 'error');
                    (new NotFoundController)->index();
                  }
                  (new AddFundsController)->post($url[3]);
                }
              }
              if ($url[2] === 'deductFunds') {
                if ($method === 'GET') {
                  if (!Auth::auth()) {
                    self::redirect('login');
                  }
                  (new DeductFundsController)->index($url[3]);
                }
                if ($method === 'POST') {
                  if (($_POST['csrf'] ?? '') != Auth::csrf()) {
                    Messages::add('Blogas portas', 'error');
                    (new NotFoundController)->index();
                  }
                  (new DeductFundsController)->post($url[3]);
                }
              }
              (new NotFoundController)->index();
            } else {
              (new NotFoundController)->index();
            }
          } else {
            (new NotFoundController)->index();
          }
        } else {
          (new NotFoundController)->index();
        }
      } else {
        (new NotFoundController)->index();
      }
    }
  }

  public static function view(string $fileName, array $data = []): string
  {
    extract($data);
    return require __DIR__ . '/../views/' . $fileName . '.php';
  }
}
