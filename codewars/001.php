<?php
function points(array $games): int
{
  $points = 0;
  foreach ($games as $value) {
    echo '0 ' . $value[0];
    echo '<br>';
    echo '1 ' . $value[2];
    echo '<br>';
    if ($value[0] > $value[2]) {
      $points += 3;
    } elseif ($value[0] === $value[2]) {
      $points++;
    }
  }
  return $points;
}

echo points(['1:1', '2:2', '3:3', '4:4', '2:2', '3:3', '4:4', '3:3', '4:4', '4:4']);


$num1 = sqrt(9);
echo '<br>';
echo '<br>';
echo $num1;
echo '<br>';
echo fmod($num1, 1);
echo '<br>';
echo $num1 % 1;
echo '<br>';
echo gettype($num1);
echo '<br>';
if (ctype_digit(10.1)) {
  echo 'true';
} else {
  echo 'false';
}
echo '<br>';
if (is_double($num1)) {
  echo 'true';
} else {
  echo 'false';
}
echo '<br>';


function remove(string $s): string
{
  $result = '';
  $stringArr = str_split($s);

  foreach ($stringArr as $key => $value) {
    if ($value !== '!') {
      $result .= $value;
    }
  }
  return $result . '!';
}

echo '<br>';
echo remove('!Hi!!');
echo '<br>';
echo '<br>';

function quarterOf($month)
{
  return (int)ceil($month / 3);
}

echo quarterOf(1);
echo '<br>';
echo quarterOf(2);
echo '<br>';
echo quarterOf(3);
echo '<br>';
echo quarterOf(4);
echo '<br>';
echo quarterOf(5);
echo '<br>';
echo quarterOf(6);
echo '<br>';
echo quarterOf(7);
echo '<br>';
echo quarterOf(8);
echo '<br>';
echo quarterOf(9);
echo '<br>';
echo quarterOf(10);
echo '<br>';
echo quarterOf(11);
echo '<br>';
echo quarterOf(12);
echo '<br>';
