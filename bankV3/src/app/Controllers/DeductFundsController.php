<?php

namespace Bankas\Controllers;

use Bankas\Interfaces\PagesInterface;
use Bankas\App;

class DeductFundsController implements PagesInterface
{

  public static function index(): void
  {
    App::view('deductFunds');
  }
}
