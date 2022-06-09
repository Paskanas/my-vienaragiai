<?php

namespace Bankas\Controllers;

require __DIR__ . '/../functions/accountDeletion.php';

use Bankas\App;
use Bankas\Interfaces\PagesInterface;
use Bankas\Validations\Messages;

class AccountListController implements PagesInterface
{
  public static function index(): void
  {
    App::view('accountList', ['messages' => Messages::get()]);
  }
  public static function post()
  {
    $accountsData = [];
    if (file_exists(__DIR__ . '/../../data/accounts.json')) {
      $accountsData = json_decode(file_get_contents(__DIR__ . '/../../data/accounts.json'), true);
      usort($accountsData, function ($item1, $item2) {
        return $item1['surname'] <=> $item2['surname'];
      });
      // account deletion
      accountDeletion($accountsData);
    }

    return App::redirect('accountList');
  }
}
