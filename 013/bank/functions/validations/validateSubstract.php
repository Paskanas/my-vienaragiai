<?php
require __DIR__ . '/formatMessage.php';
function validateSubtract($err)
{
  $message = '';
  if ($err == 1) {
    $message = 'Sąskaitos likutis nepakankamas';
  } else if ($err == 2) {
    $message = 'Suma negali būti mažesnė ar lygi 0';
  }
  return putMessageToDiv($message);
}
