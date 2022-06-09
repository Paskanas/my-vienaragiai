<?php

function putMessageToDiv($message, $type = 'error')
{
  if ($message) {
    return '<div class="' . $type . '">' . $message . '</div>';
  }
  return $message;
}
