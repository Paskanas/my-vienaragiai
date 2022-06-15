<?php

namespace Bankas\Controllers;

use Bankas\App;

class NotFoundController
{
  public function index()
  {
    print_r($_POST);
    App::view('notFound');
  }
}
