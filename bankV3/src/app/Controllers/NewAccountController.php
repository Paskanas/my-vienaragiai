<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Interfaces\PagesInterface;

class NewAccountController implements PagesInterface
{
  public static function index(): void
  {
    App::view('newAccount');
  }
}
