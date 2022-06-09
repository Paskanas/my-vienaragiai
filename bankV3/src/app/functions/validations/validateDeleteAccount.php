<?php
require __DIR__ . '/formatMessage.php';
function validateDeleteAccount($err, $accountsData)
{
  $message = '';
  if ($err == 0) {
    $message = '<div>Įrašas su asmens kodu ' . $accountsData[count($accountsData) - 1]['identityCode'] . ', sėkmingai sukurtas.</div>';
    return putMessageToDiv($message, 'message');
  } else if ($err == 1) {
    $message = 'Įrašas sėkmingai ištrintas';
    return putMessageToDiv($message, 'message');
  } else if ($err == 2) {
    $message = 'Įrašo išytrinti negalima, nes balansas nelygu 0';
    return putMessageToDiv($message);
  }
}
