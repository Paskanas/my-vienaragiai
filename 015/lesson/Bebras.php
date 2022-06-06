<?php
class Bebras
{
  private $name = 'none';
  private $age, $childrens;

  public function __construct(string $name = 'bevardis', array $childrens = [])
  {
    echo '<br>magic construct<br>';
    $this->age = 100;
    $this->name = $name;
    $this->childrens = $childrens;
  }

  public function __destruct()
  {
    echo '<br>Miriau<br>';
  }

  public function __get($what)
  {
    // echo '<br>' . 'magic get' . '<br>';
    // echo '<br>' . $what . '<br>';

    // return 'Nieko nera namie';
    if (in_array($what, ['name', 'age'])) {
      return $this->$what;
    }
    return 'None';
  }

  public function __set($name, $value)
  {
    if (in_array($name, ['name'])) {
      $this->$name = $value;
    }
  }

  public function set_name(int $name)
  {
    if ($name) {
      $this->name = $name;
    } else {
      return;
    }
  }

  public function set_age(int $age)
  {
    $this->age += $age;
  }

  function get_name()
  {
    print_r($this);
  }
  function get_age()
  {
    return $this->age;
  }
}
