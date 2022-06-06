<?php

class Cart
{
  public $id;
  static private $cart;
  const BAD = 'klasine';

  //uzdrausti klonuoti
  // private function __clone()
  // {
  // }

  //uzdrausti unserialize pazadinti
  // public function __wakeup()
  // {
  //   throw new \Exception("Cannot unserialize a singleton.");
  // }

  // public function __sleep()
  // {
  //   throw new \Exception("Cannot unserialize a singleton.");
  //   return [];
  // }

  private function __construct()
  {
    $this->id = rand(100, 200);
  }

  public static function createObj()
  {
    if (!self::$cart) {
      self::$cart = new self;
    }
    return self::$cart;
  }
}
