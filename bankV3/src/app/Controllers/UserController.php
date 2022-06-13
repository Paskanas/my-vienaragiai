<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Validations\Messages;
use Bankas\Controllers\AuthorizationController as Auth;


class UserController
{
  public static function showLogin()
  {
    return App::view('login', ['messages' => Messages::get()]);
  }

  public static function doLogin()
  {
    $users = json_decode(file_get_contents(__DIR__ . '/../../data/users.json'));
    foreach ($users as $user) {
      if ($user->name !== $_POST['name']) {
        continue;
      }

      if ($user->password !== md5($_POST['password'])) {
        Messages::add('Neteisingi duomenys1', 'error');
        return App::redirect('login');
      } else {
        Auth::authAdd($user);
        Messages::add('Sveikas ' . $user->fullName, 'message');
        return App::redirect('');
      }
    }

    Messages::add('Neteisingi duomenys2', 'error');
    return App::redirect('login');
  }

  public static function logout()
  {
    Auth::authRemove();
    Messages::add('Viso', 'message');
    return App::redirect('login');
  }
}
