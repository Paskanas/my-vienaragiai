<?php

namespace Bankas\Controllers;

use Bankas\App;

class NotFoundController
{

  public function index()
  {
    return App::view('404');
  }
}
