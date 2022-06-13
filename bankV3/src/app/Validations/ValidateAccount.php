<?php

namespace Bankas\Validations;

use Bankas\App;
use Bankas\Validations\Messages;

class ValidateAccount
{

  public static function validateDelete($account)
  {
    if ($account['balance'] === 0) {
      Messages::add('Įrašas sėkmingai ištrintas', 'message');
      return true;
    } else {
      Messages::add('Įrašo išytrinti negalima, nes balansas nelygu 0', 'error');
      return false;
    }
  }

  public static function validateAdd($sum)
  {
    if ($sum <= 0) {
      Messages::add('Suma negali būti mažesnė ar lygi 0', 'error');
      return false;
    }
    Messages::add('Veiksmas sėkmingai atliktas', 'message');
    return true;
  }

  public static function validateSubstract($sum, $currentAccount)
  {
    if ($sum <= 0) {
      Messages::add('Suma negali būti mažesnė ar lygi 0', 'error');
      return false;
    }
    if ($currentAccount['balance'] >= $_POST['sum']) {
      Messages::add('Veiksmas sėkmingai atliktas', 'message');
      return true;
    } else {
      Messages::add('Sąskaitos likutis nepakankamas', 'error');
      return false;
    }
  }

  public static function validateIdentityCode($identityCode, $name, $surname): bool
  {
    $controlNumber = 0;
    $controlNumberCounter = 1;
    $accountsList = App::$db->showAll();
    if (!is_numeric($identityCode)) {
      Messages::add('Įvestas ne skaičius', 'error');
      return false;
    } else if (strlen($identityCode) < 11) {
      Messages::add('Asmens kodas negali būti trumpesnis nei 11 simbolių', 'error');
      return false;
    } else if (strlen($identityCode) > 11) {
      Messages::add('Asmens kodas negali būti ilgensis nei 11 simbolių', 'error');
      return false;
    } else if (strval($identityCode)[0] != 3 && strval($identityCode)[0] != 4) {
      Messages::add('Asmens kodas turi prasideti skaičiu 3 arba 4', 'error');
      return false;
    } else if (substr($identityCode, 3, 2) > 12) {
      Messages::add('Neteisingi asmens kodo 4-5 skaitmenys', 'error');
      return false;
    } else if (substr($identityCode, 5, 2) > 31) {
      Messages::add('Neteisingi asmens kodo 6-7 skaitmenys', 'error');
      return false;
    } else if (strlen($name) < 3) {
      Messages::add('Įvestas per trumpas vardas', 'error');
      return false;
    } else if (strlen($surname) < 3) {
      Messages::add('Įvesta per trumpa pavardė', 'error');
      return false;
    } else {
      foreach (str_split($identityCode) as $key => $value) {
        if ($key !== 10) {
          if ($controlNumberCounter === 10) {
            $controlNumberCounter = 1;
          }
          $controlNumber += intval($value) * $controlNumberCounter;
          $controlNumberCounter++;
        }
      }
      if ($controlNumber % 11 === 10) {
        // do not know if it needs reset $controlNumber = 0;
        foreach (str_split($identityCode) as $key => $value) {
          if ($key !== 10) {
            if ($controlNumberCounter === 10) {
              $controlNumberCounter = 1;
            }
            $controlNumber += intval($value) * $controlNumberCounter;
            $controlNumberCounter++;
          }
        }
      }

      if ($controlNumber % 11 === 10) {
        $controlNumber = 0;
      } else {
        $controlNumber = $controlNumber % 11;
      }
      if ($controlNumber != substr($identityCode, -1)) {
        Messages::add('Įvestas nevalidus asmens kodas', 'error');
        return false;
      }

      if ($accountsList) {
        foreach ($accountsList as $acount) {
          if ($acount['identityCode'] === $identityCode) {
            Messages::add('Vartotojas su tokiu asmens kodu jau egzistuoja', 'error');
            return false;
          }
        }
      }
    }
    Messages::add('Įrašas sėkmingai sukurtas', 'message');
    return true;
  }
}
