<?php
require __DIR__ . '/formatMessage.php';
function validateDeleteAccount($err)
{
  $message = '';
  if ($err == 1) {
    $message = 'Įrašas sėkmingai ištrintas';
  } else if ($err == 0) {
    $message = 'Įrašo išytrinti negalima, nes balansas nelygu 0';
  }
  return putMessageToDiv($message);
}
