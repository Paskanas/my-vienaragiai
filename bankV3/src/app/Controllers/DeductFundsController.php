<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Interfaces\AddRemovePagesInterface;
use Bankas\Validations\Messages;
use Bankas\Validations\ValidateAccount;

class DeductFundsController implements AddRemovePagesInterface
{

  public static function index($id): void
  {
    $name = App::$db->getRecordDataByName($id, 'name');
    $surname = App::$db->getRecordDataByName($id, 'surname');
    $balance = App::$db->getRecordDataByName($id, 'balance');
    App::view('deductFunds', ['messages' => Messages::get(), 'id' => $id, 'name' => $name, 'surname' => $surname, 'balance' => $balance]);
  }

  public static function post($id): void
  {
    $currentAccount = App::$db->show($id);
    if (ValidateAccount::validateSubstract($_POST['sum'], $currentAccount)) {
      $currentAccount['balance'] -= $_POST['sum'];
      App::$db->update($id, $currentAccount);
    }
    App::redirect('deductFunds', $id);
  }
}
