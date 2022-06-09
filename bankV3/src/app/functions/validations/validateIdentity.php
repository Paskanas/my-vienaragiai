<?php
require __DIR__ . '/validateNumber.php';
function validateIdentityCode($accountsList, $identityCode, $name, $surname)
{
  $controlNumber = 0;
  $controlNumberCounter = 1;
  if (validateNumber($identityCode)) {
    return 7;
  } else if (strlen($identityCode) < 11) {
    return 2;
  } else if (strlen($identityCode) > 11) {
    return 3;
  } else if (strval($identityCode)[0] != 3 && strval($identityCode)[0] != 4) {
    return 4;
  } else if (substr($identityCode, 3, 2) > 12) {
    return 5;
  } else if (substr($identityCode, 5, 2) > 31) {
    return 6;
  } else if (strlen($name) < 3) {
    return 9;
  } else if (strlen($surname) < 3) {
    return 10;
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
      // $controlNumber = 0;
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
      return 8;
    }

    if ($accountsList) {
      foreach ($accountsList as $acount) {
        if ($acount['identityCode'] === $identityCode) {
          return 1;
        }
      }
    }
  }

  return 0;
}

function getErrMessage($err)
{
  require __DIR__ . '/formatMessage.php';

  $message = '';
  if ($err == 1) {
    $message = 'Vartotojas su tokiu asmens kodu jau egzistuoja';
  } else if ($err == 2) {
    $message = 'Asmens kodas negali būti trumpesnis nei 11 simbolių';
  } else if ($err == 3) {
    $message = 'Asmens kodas negali būti ilgensis nei 11 simbolių';
  } else if ($err == 4) {
    $message = 'Asmens kodas turi prasideti skaičiu 3 arba 4';
  } else if ($err == 5) {
    $message = 'Neteisingi asmens kodo 4-5 skaitmenys';
  } else if ($err == 6) {
    $message = 'Neteisingi asmens kodo 6-7 skaitmenys';
  } else if ($err == 7) {
    $message = getValidateNumberMessage(1);
  } else if ($err == 8) {
    $message = 'Įvestas nevalidus asmens kodas';
  } else if ($err == 9) {
    $message = 'Įvestas per trumpas vardas';
  } else if ($err == 10) {
    $message = 'Įvesta per trumpa pavardė';
  }

  return putMessageToDiv($message);
}
