<?php


//s,m,l, xl
$s = 's';

echo "<h2>Yra: $s</h2>";

if ($s === 's') {
  echo '<h3>Tikrinam S</h3>';
}
if ($s === 's' || $s === 'm') {
  echo '<h3>Tikrinam M</h3>';
}
if ($s === 's' || $s === 'm' || $s === 'l') {
  echo '<h3>Tikrinam L</h3>';
}
if ($s === 's' || $s === 'm' || $s === 'l' || $s === 'xl') {
  echo '<h3>Tikrinam XL</h3>';
}

echo  '-------------------------<br>';

switch ($s) {
  case 's':
    echo '<h3>Tikrinam S</h3>';
  case 'm':
    echo '<h3>Tikrinam M</h3>';
  case 'l':
    echo '<h3>Tikrinam L</h3>';
  case 'xl':
    echo '<h3>Tikrinam XL</h3>';
    break;
  default:
    echo '<h3>Eik namo</h3>';
}

// $returnValue = '';
echo '----------------<br>';
echo $s;
$returnValue = match ($s) {
  's' =>  '<h3>Tikrinam S</h3>',
  'm' =>  '<h3>Tikrinam M</h3>',
  'l' =>  '<h3>Tikrinam L</h3>',
  'xl' =>  '<h3>Tikrinam XL</h3>',
  default => '<h3>unknown</h3>',
};

echo $returnValue;
