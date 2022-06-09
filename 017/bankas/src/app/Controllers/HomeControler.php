<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Validations\Messages as M;

class HomeControler
{

  public function getIt($param)
  {
    echo 'AAa-' . $param;
  }

  public function index()
  {
    $list = [];
    for ($i = 0; $i < 10; $i++) {
      $list[] = rand(1000, 9999);
    }
    return App::view('home', ['content' => 'Alabama', 'list' => $list]);
    // echo 'namai';
    // echo '<br>';
  }
  public function indexJson()
  {
    $list = [];
    for ($i = 0; $i < 10; $i++) {
      $list[] = rand(1000, 9999);
    }
    return App::json(['content' => 'Alabama', 'list' => $list]);
    // echo 'namai';
    // echo '<br>';
  }

  public function form()
  {
    return App::view('form', ['messages' => M::get()]);
  }

  public function doForm()
  {
    M::add('Puiku', 'success');
    M::add($_POST['alabama'], 'error');

    return App::redirect('form');
  }
}
