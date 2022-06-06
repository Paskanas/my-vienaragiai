<?php

use Meska\Lokys\Vaikas as V;
use Super\Old\Senelis;
use Meska\Lokys\Tevukas;

// spl_autoload_register(function ($class) {
//   require __DIR__ . '/' . $class . '.php';
// });


// require __DIR__ . '/Stikline.php';
// require __DIR__ . '/Cart.php';
// require __DIR__ . '/Senelis.php';
// require __DIR__ . '/Tevukas.php';
// require __DIR__ . '/Vaikas.php';
require __DIR__ . '/vendor/autoload.php';


$senelis1 = new Senelis;
$senelis1->sektiPasaka();

$tevukas1 = new Tevukas;
$tevukas1->tvarka();
$tevukas1->sektiPasaka();

$vaikas1 = new V;
$vaikas1->betvarke();
// $vaikas1->tvarka();
$vaikas1->sektiPasaka();


$cart1 = Cart::createObj();
$cart2 = Cart::createObj();
// $cart3 = clone $cart1;                   //uzbanintas klonavimas
// $cart4 = unserialize(serialize($cart1)); //uzbanintas unserialize
// $cart5 = unserialize('O:4:"Bart":2:{s:5:"namas";i:2020;s:2:"id";i:22;}');

$stikline1 = new Stikline;
$stikline2 = new Stikline;
$stikline3 = new Stikline;

echo '<pre>';
// echo serialize($cart1);                  //uzbanintas serialize
echo '<br>';
echo json_encode($cart1);
echo '<br>';
echo '<br>';
var_dump($cart1);
echo '<br>';
var_dump($cart2);
echo '<br>';
// var_dump($cart3);
// echo '<br>';
// var_dump($cart4);
// echo '<br>';
// var_dump($cart5);
// echo '<br>';
echo Cart::BAD;
echo '<br>';
echo '<br>';

print_r($stikline1);
echo '<br>';
print_r($stikline2);
echo '<br>';
print_r($stikline3);
echo '<br>';
echo Stikline::$visoPilta;
echo '<br>';
echo $stikline1::$visoPilta;
echo '<br>';
// $stikline1::$visoPilta = 200;

echo $stikline1->kiek();
echo '<br>';
echo $stikline2->kiek();
echo '<br>';
echo $stikline3->kiek();
echo '<br>';

Stikline::valio();
echo '<br>';
$stikline1::valio();
echo '<br>';
echo $stikline2::$visoPilta;
echo '<br>';

$stikine4 = Stikline::createObj();
print_r($stikine4);
echo $stikline2::$visoPilta;
echo '<br>';
