<?php

namespace Bankas\Validations;

class Messages
{

  private static $messages;

  public static function init(): void
  {
    self::$messages = $_SESSION['message'] ?? [];
    unset($_SESSION['message']);
  }

  public static function add(string $text, string $type)
  {
    $_SESSION['message'][] = ['message' => $text, 'type' => $type];
  }

  public static function get(): array
  {
    return self::$messages;
  }
}
