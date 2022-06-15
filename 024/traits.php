<?php
trait SayMiau
{
  public function sayMiau()
  {
    // parent::sayHello();
    echo 'Mrrrrrrr... <br>';
  }
}
trait SayBye
{
  use SayMiau;
  public function sayBye()
  {
    // parent::sayHello();
    echo 'Bye !<br>';
  }
}
class Base
{
  use SayBye;
  public function sayHello()
  {
    echo 'Hello <br>';
  }
}


trait HelloK
{
  public function sayHello()
  {
    // parent::sayHello();
    echo 'Hello Kitty <br>';
  }
}

trait HelloR
{
  public function sayHello()
  {
    // parent::sayHello();
    echo 'Hello Racoon <br>';
  }
}


class MyHelloWorld extends Base
{
  use HelloK, HelloR {
    HelloR::sayHello insteadof HelloK;
    HelloK::sayHello as sayHelloKitty;
  }
}


$o = new MyHelloWorld();
$o->sayHello();
$o->sayBye();
$o->sayMiau();
$o->sayHelloKitty();
