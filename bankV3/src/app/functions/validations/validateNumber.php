<?php

function validateNumber($num)
{
  if (intval($num) != $num) {
    return true;
  }
  return false;
}

function getValidateNumberMessage($err)
{
  $message = '';
  if ($err == 1) {
    $message = 'Įvestas ne skaičius';
  }
  return $message;
}
