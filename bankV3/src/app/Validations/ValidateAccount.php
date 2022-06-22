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
  public static function validateDelete2($balance)
  {
    if ($balance === 0) {
      return ['Įrašas sėkmingai ištrintas', 'message'];
    } else {
      return ['Įrašo išytrinti negalima, nes balansas nelygu 0', 'error'];
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
  public static function validateAdd2($sum)
  {
    if ($sum <= 0) {
      return ['Suma negali būti mažesnė ar lygi 0', 'error'];
    }
    return ['Veiksmas sėkmingai atliktas', 'message'];
  }

  public static function validateSubstract($sum, $currentAccount)
  {
    if ($sum <= 0) {
      Messages::add('Suma negali būti mažesnė ar lygi 0', 'error');
      return false;
    }
    if ($currentAccount['$balance'] >= $_POST['sum']) {
      Messages::add('Veiksmas sėkmingai atliktas', 'message');
      return true;
    } else {
      Messages::add('Sąskaitos likutis nepakankamas', 'error');
      return false;
    }
  }

  public static function validateSubstract2($sum, $balance)
  {
    if ($sum <= 0) {
      return ['Suma negali būti mažesnė ar lygi 0', 'error'];
    }
    if ($balance >= $sum) {
      return ['Veiksmas sėkmingai atliktas', 'message'];
    } else {
      return ['Sąskaitos likutis nepakankamas', 'error'];
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
  public static function validateIdentityCode2($identityCode, $name, $surname): array
  {
    $controlNumber = 0;
    $controlNumberCounter = 1;
    $accountsList = App::$db->showAll();
    if (!is_numeric($identityCode)) {
      return ['Įvestas ne skaičius', 'error'];
    } else if (strlen($identityCode) < 11) {
      return ['Asmens kodas negali būti trumpesnis nei 11 simbolių', 'error'];
    } else if (strlen($identityCode) > 11) {
      return ['Asmens kodas negali būti ilgensis nei 11 simbolių', 'error'];
    } else if (strval($identityCode)[0] != 3 && strval($identityCode)[0] != 4) {
      return ['Asmens kodas turi prasideti skaičiu 3 arba 4', 'error'];
    } else if (substr($identityCode, 3, 2) > 12) {
      return ['Neteisingi asmens kodo 4-5 skaitmenys', 'error'];
    } else if (substr($identityCode, 5, 2) > 31) {
      return ['Neteisingi asmens kodo 6-7 skaitmenys', 'error'];
    } else if (strlen($name) < 3) {
      return ['Įvestas per trumpas vardas', 'error'];
    } else if (strlen($surname) < 3) {
      return ['Įvesta per trumpa pavardė', 'error'];
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
        return ['Įvestas nevalidus asmens kodas', 'error'];
      }

      if ($accountsList) {
        foreach ($accountsList as $acount) {
          if ($acount['identityCode'] === $identityCode) {
            return ['Vartotojas su tokiu asmens kodu jau egzistuoja', 'error'];
          }
        }
      }
    }
    return ['Įrašas sėkmingai sukurtas', 'message'];
  }
}
