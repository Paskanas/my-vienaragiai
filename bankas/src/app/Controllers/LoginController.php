<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Validations\Messages;

class LoginController
{
  public static function showLogin()
  {
    return App::view('login', ['messages' => Messages::get()]);
  }
  public static function doLogin()
  {
    // $_SESSION['user'] = $_POST['name'];

    // if (!file_exists(App::APP . 'data/users.json')) {
    $users = json_decode(file_get_contents(App::APP . 'data/users.json'));
    // }

    foreach ($users as $user) {
      if ($user->name !== $_POST['name']) {
        continue;
      }

      if ($user->password !== md5($_POST['password'])) {
        Messages::add('Neteisingi duomenys1', 'error');
        return App::redirect('login');
      } else {
        App::authAdd($user);
        Messages::add('Sveikas ' . $user->fullName, 'success');
        return App::redirect('');
      }
    }

    Messages::add('Neteisingi duomenys2', 'error');
    return App::redirect('login');
  }
  public static function logout()
  {
    App::authRemove();
    Messages::add('Viso', 'success');
    return App::redirect('login');
  }
}
