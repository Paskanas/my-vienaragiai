<?php

$valio = 'Valio!';
function fun(&$param)
{
  echo "<h1>$param</h1>";
  $param .= '!!!!';
}
echo '<br>';
fun($valio);
echo "<h1>$valio</h1>";

$x = 1;
$fn = fn ($x) => $x += 1; // Has no effect
$fn($x);
echo $x;         // Outputs 1
echo '<br>';
echo $fn($x);    // Outputs 2
echo '<br>';
var_export($x);  // Outputs 1
$x = $fn($x);
echo '<br>';
var_export($x);  // Outputs 2
echo '<br>';
echo '<br>';


$ff = fn ($x) => $x ** 2;

echo $ff(10);
echo '<br>';

$f1 = fn ($a) => $a;

echo $f1(10);
echo '<br>';
echo '<br>';

$dob = function ($age) {
  if (!$age) {
    return null;
  }
  $new_age = 2021 - $age;
  echo "Your new age is " . $new_age;

  return $new_age;
};
$dob1 = 0;

$dob1 = $dob(10);
echo '<br>';
echo $dob1;
echo '<br>';

$fa = function ($ar1) {
  echo $ar1 . ' ' . $ar1;
  return $ar1;
};

echo '<br>';
$fa('labas');
echo '<br>';

function kelintas()
{
  static $k = 0;
  $k++;
  return $k;
}


echo kelintas();
echo '<br>';
echo kelintas();
echo '<br>';
echo kelintas();
echo '<br>';


$f3 = function ($par1) {
  echo $par1;
};

$f3('labassssss');


$f4 = fn ($ar1) => ($ar1++);



function funSum($a, $b)
{
  echo '<br>';
  return $b($a);
}

echo '<br>';

function meska($c)
{
  return $c * 10;
}

$meska2 = function ($c) {
  return $c + 20;
};

echo funSum(5, fn ($c) => $c + $c);
echo funSum(5, fn ($c) => $c++);
echo funSum(5, 'meska');
echo funSum(5, $meska2);

echo '<br>';
function zuikis()
{
  echo '<br>';
  return fn () => 123;
}
$zuikis2 = fn () => fn () => 123;
$zuikis3 = fn () => fn ($d) => 123 + $d;


echo zuikis()();
echo '<br>';
echo $zuikis2()();
echo '<br>';
var_dump($zuikis2);
echo '<br>';
var_dump($zuikis2());
echo '<br>';
print_r($zuikis2);
echo '<br>';
print($zuikis2()());
echo '<br>';
print($zuikis3()(5));


$masyvas = [
  ['a', 'd'],
  ['b', 'e'],
  ['a', 'f'],
  ['k', 'c']
];

// usort($masyvas, function ($a, $b) {
//   return $a[1] <=> $b[1];
// });
usort($masyvas, fn ($a, $b) => $a[1] <=> $b[1]);

echo '<pre>';
print_r($masyvas);
echo '</pre>';


$result = 0;
$one = function () {
  @var_dump($result);
};

$two = function () use ($result) {
  var_dump($result);
};

$three = function () use (&$result) {
  var_dump($result);
};

$fourth = fn () => var_dump($result);

// $fifth = fn () => var_dump($result); //negalimas 

$result++;

echo '<br>';
$one();    // NULL: $result nepasiekiamas
echo '<br>';
$two();    // int(0): $result nukopijuojamas
echo '<br>';
$three();    // int(1)
echo '<br>';
// $four();    // int(0)
echo '<br>';


// anonimine rekursine funkcija

$func = function ($limit = NULL) use (&$func) {
  static $current = 10;

  // tikrinam eigą
  if ($current <= 0) {
    //išeinam 
    return FALSE;
  }

  // spausdinam reikšmę.
  echo "$current<br>";

  $current--;

  $func();
};
//  Kviečiam funkciją
$func();
echo '<pre>';
echo '<br>';
echo preg_replace_callback('/\d+/', 'ieskok', 'casdasd' . rand(1000, 9999) . 'asdd asda sda');
echo '<br>';
echo '<br>';
echo preg_replace_callback('/(.)(\d(\d\d)\d)/', 'ieskok', 'casdasd' . rand(1000, 9999) . 'asdd a156431sda sda');
echo '<br>';
echo '<br>';
echo preg_replace_callback('/\.(.*)\./', 'ieskok', 'casd.asd' . rand(1000, 9999) . 'as.dd a156431sda sda');
echo '<br>';

echo '</pre>';
function ieskok($m)
{
  print_r($m);
  return '<b>' . $m[1] . '</b>';
}


echo '<pre>';
$m = [5, 2, 1, 3, 5, 4, 8, 6, 4, 8, 7, 7];
print_r($m);

$m3 = array_slice($m, -4);
print_r($m3);
echo '</pre>';


$num = rand(100, 999);
echo 'Random numeriukas: ' . $num;
echo '<br>';
// $fun1 = function ($arg) {
//   echo 'x3: ' . $arg * 3;
//   echo '<br>';
//   return $arg * 3;
// };

// $fun2 = function ($arg) {
//   echo 'x5: ' . $arg * 5;
//   echo '<br>';
//   return $arg * 5;
// };

// $fun3 = function ($arg) {
//   echo 'x7: ' . $arg * 7;
//   echo '<br>';
//   return $arg * 7;
// };

// $numArr = [$fun1, $fun2, $fun3];
$numArr = [];

array_push(
  $numArr,
  function ($arg) {
    echo 'x3: ' . $arg * 3;
    echo '<br>';
    return $arg * 3;
  },
  function ($arg) {
    echo 'x5: ' . $arg * 5;
    echo '<br>';
    return $arg * 5;
  },
  function ($arg) {
    echo 'x7: ' . $arg * 7;
    echo '<br>';
    return $arg * 7;
  }
);


foreach ($numArr as $value) {
  static $result = 0;
  if ($result === 0) {
    $result = $num;
  }
  $result = $value($result);
  echo $result;
  echo '<br>';
}
echo '<br>';
foreach ($numArr as &$value) {
  $value = $value($num);
}


echo '<br>';

function gen_one_to_three()
{
  for ($i = 1; $i <= 3; $i++) {
    echo 'Ciklo vidus ' . $i;
    echo '<br>';
    // Note that $i is preserved between yields.
    yield $i => rand(1000, 9999);
  }
}

$generator = gen_one_to_three();
var_dump($generator);
echo '<br>';

foreach ($generator as $key => $value) {
  echo 'Key: ' . "$key\n";
  echo '<br>';
  echo 'Value: ' . "$value\n";
  echo '<br>';
}

echo '<br>';

$transport = ['foot', 'bike', 'car', 'plane'];
$mode = current($transport); // $mode = 'foot';
echo $mode;
echo '<br>';
$mode = next($transport);    // $mode = 'bike';
echo $mode;
echo '<br>';
$mode = next($transport);    // $mode = 'car';
echo $mode;
echo '<br>';
$mode = prev($transport);    // $mode = 'bike';
echo $mode;
echo '<br>';
$mode = end($transport);     // $mode = 'plane';
echo $mode;
echo '<br>';
$mode1 = reset($transport);
echo $mode;
echo '<br>';
$mode = current($transport); // $mode = 'foot';
echo $mode;
echo '<br>';
$mode = next($transport);    // $mode = 'car';
echo $mode;
echo '<br>';
$mode = next($transport);    // $mode = 'car';
echo $mode;
echo '<br>';
echo key($transport);
echo '<br>';
// removed from php 8
// $foo = array("bob", "fred", "jussi", "jouni", "egon", "marliese");
// $bar = each($foo);
// print_r($bar);

$a = [1, 2, 3,];
$b = [1, 1, 1, 5, 5,];
$c = $a + $b;
// $d = $b - $a;
echo '<pre>';
print_r($c);
echo '</pre>';
