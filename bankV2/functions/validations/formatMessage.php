<?php

function putMessageToDiv($message)
{
  if ($message) {
    return '<div class="message">' . $message . '</div>';
  }
  return $message;
}
