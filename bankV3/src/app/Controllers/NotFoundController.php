<?php

namespace Bankas\Controllers;

use Bankas\App;

class NotFoundController
{
  public function index()
  {
    App::view('notFound');
  }
}
