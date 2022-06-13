<?php

namespace Bankas\Controllers;

class AuthorizationController
{
  public static function csrf()
  {

    return md5('namaliam' . $_SERVER['HTTP_USER_AGENT']);
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
}
