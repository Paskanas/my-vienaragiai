<?php
function generateIban()
{
  $ibanArr = [];
  $rand = rand(1, 999999999999999999);
  $numLength = strlen((string)$rand);
  $iban = 'LT' . str_repeat('0', 18 - $numLength) . $rand;
  $ibanArr = str_split($iban);
  $ibanResult = '';
  foreach ($ibanArr as $key => $value) {
    $ibanResult .= $value;
    if (($key + 1) % 4 === 0 && $key !== 19) {
      $ibanResult .= ' ';
    }
  }
  return $ibanResult;
}

function saveIban($iban)
{
  $path = __DIR__ . '/../../data/ibans.json';
  $allIbans = [];
  if (file_exists($path)) {
    $allIbans = json_decode(file_get_contents($path), true);
    file_put_contents($path, json_encode([...$allIbans, $iban]));
  }
}

function createIBAN()
{
  $iban = '';
  $allIbans = [];
  $path = __DIR__ . '/../../data/ibans.json';
  if (!file_exists($path)) {
    file_put_contents($path, json_encode([]));
  }
  $allIbans = json_decode(file_get_contents($path), true);
  $iban = generateIban();
  while (array_key_exists($iban, $allIbans)) {
    $iban = generateIban();
  }

  return $iban;
}
