<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Interfaces\PagesInterface;

class HomeController implements PagesInterface
{
  public static function index(): void
  {
    App::view('home');
  }
}
