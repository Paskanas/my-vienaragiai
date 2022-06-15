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
    $convertTo = $_SESSION['convertTo'] ?? 'VES';
    unset($_SESSION['convertTo']);
    App::view('accountList', ['messages' => Messages::get(), 'convertTo' => $convertTo]);
  }

  public static function post()
  {
    print_r($_POST);
    if (isset($_POST['delete'])) {
      $accountsData = App::$db->showAll();
      if ($accountsData) {
        $account = App::$db->show($_POST['delete']);
        if (ValidateAccount::validateDelete($account)) {
          App::$db->delete($_POST['delete']);
        }
      }
    }
    if (isset($_POST['currency'])) {
      $_SESSION['convertTo'] = $_POST['currency'];
    }

    App::redirect('accountList');
  }
}
