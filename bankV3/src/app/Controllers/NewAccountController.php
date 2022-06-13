<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Interfaces\PagesInterface;
use Bankas\Validations\Messages;
use Bankas\Validations\ValidateAccount;

class NewAccountController implements PagesInterface
{
  public static function index(): void
  {
    $name = '';
    $surname = '';
    $identityCode = '';
    $iban = self::generateIban();
    self::getFormData($name, $surname, $identityCode);

    App::view('newAccount', [
      'messages' => Messages::get(),
      'bankAccount' => $iban,
      'name' => $name,
      'surname' => $surname,
      'identityCode' => $identityCode
    ]);
  }

  public static function post()
  {
    $noValidate = ValidateAccount::validateIdentityCode($_POST['identityCode'], $_POST['name'], $_POST['surname']);
    if ($noValidate) {
      App::$db->create([...$_POST, 'balance' => 0]);
      return App::redirect('accountList');
    }
    self::saveFormData($_POST['name'], $_POST['surname'], $_POST['identityCode']);
    App::redirect('newAccount');
  }

  private static function generateIban()
  {
    $loopCounter = 0;
    $newIdString = strval(App::$db->maxId() + 1);
    $iban = 'LT' . hexdec(substr(sha1($newIdString), 0, 15));
    while (strlen($iban) !== 20 && $loopCounter < 50) {
      $newIdString .= 'a';
      $loopCounter++;
      $iban = 'LT' . hexdec(substr(sha1($newIdString), 0, 15));
    }
    return $iban;
  }

  private static function getFormData(&$name, &$surname, &$identityCode)
  {
    if (isset($_SESSION['name']) && isset($_SESSION['surname']) && isset($_SESSION['identityCode'])) {
      $name = $_SESSION['name'];
      $surname = $_SESSION['surname'];
      $identityCode = $_SESSION['identityCode'];
      unset($_SESSION['name']);
      unset($_SESSION['surname']);
      unset($_SESSION['identityCode']);
    }
  }

  private static function saveFormData($name, $surname, $identityCode)
  {
    $_SESSION['name'] = $name;
    $_SESSION['surname'] = $surname;
    $_SESSION['identityCode'] = $identityCode;
  }
}
