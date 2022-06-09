<?php

namespace Bankas\Controllers;


use Bankas\App;
use Bankas\Validations\Messages;
//use Bankas\Interfaces\PagesInterface;

class AddFundsController //implements PagesInterface
{
  public static function index($id): void
  {
    App::view('addFunds', ['messages' => Messages::get(), 'id' => $id]);
  }
  public static function post($id): void
  {
    $allAccounts = [];
    if (file_exists(__DIR__ . '/../../data/accounts.json')) {
      $allAccounts = json_decode(file_get_contents(__DIR__ . '/../../data/accounts.json'), true);
    }
    require(__DIR__ . '/../functions/add.php');

    App::redirect('addFunds', $id);
  }
}
