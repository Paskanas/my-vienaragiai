<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Interfaces\PagesInterface;
use Bankas\Validations\Messages;
use Bankas\Validations\ValidateAccount;

class AccountListController  implements PagesInterface
{
  public static function index(): void
  {
    App::view('accountList', ['messages' => Messages::get()]);
  }

  public static function post()
  {
    $accountsData = App::$db->showAll();
    if ($accountsData) {
      $account = App::$db->show($_POST['delete']);
      if (ValidateAccount::validateDelete($account)) {
        App::$db->delete($_POST['delete']);
      }
    }

    App::redirect('accountList');
  }
}
