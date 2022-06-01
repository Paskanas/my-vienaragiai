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

function squareOrSquareRoot($array)
{
  foreach ($array as &$value) {
    echo sqrt($value);
    echo '<br>';
    echo '% ' . sqrt($value) % 1;
    echo '<br>';
    $sqrtValue = sqrt($value);
    if (floor($sqrtValue) === $sqrtValue) {
      $value = sqrt($value);
    } else {
      $value = $value ** 2;
    }
  }
  return $array;
}


print_r(squareOrSquareRoot([4, 3, 9, 7, 2, 1]));

echo '<br>';

function twice_as_old($dad_years_old, $son_years_old)
{
  $counter = 0;
  while (($dad_years_old !== $son_years_old * 2) && ($dad_years_old !== 0)) {
    $dad_years_old--;
    $counter++;
    if ($counter > 30) {
      break;
    }
  }
  return $counter;
}

echo twice_as_old(36, 7);

function square_sum($numbers): int
{
  $sum = 0;
  foreach ($numbers as $number) {
    $sum += $number ** 2;
  }
  return $sum;
}

echo '<br>';
echo '<br>';
echo square_sum([1, 2, 3, 4]);


function getGrade($a, $b, $c)
{
  $avg = ($a + $b + $c) / 3;
  if ($avg < 60) {
    return 'F';
  } else if ($avg < 70) {
    return 'D';
  } else if ($avg < 80) {
    return 'C';
  } else if ($avg < 90) {
    return 'B';
  } else if ($avg < 100) {
    return 'A';
  } else {
    return 'aa';
  }
}

echo getGrade(90, 95, 80);

function minSum($arr)
{
  sort($arr);
  print_r($arr);
  $sum = 0;
  for ($i = 0; $i < count($arr) - 1 / 2; $i++) {
    $sum += $arr[$i] * $arr[count($arr) - 1 - $i];
  }
  return $sum;
}

echo minSum([1, 5, 8, 2, 3, 6]);

function dont_give_me_five($start, $end)
{
  // echo $start;
  // echo '<br>';
  // echo $end;
  // echo '<br>';
  // echo '<br>';
  $skirtumas = $end - $start + 1;
  $counter = 0;
  for ($i = $start; $i <= $end; $i++) {
    if ($i % 5 === 0 && ($i / 5) % 2 !== 0) {
      echo $i;
      echo '<br>';
      $counter++;
    }
    $a = $i;
    // echo 'bb ' . substr($a, 0, 1);
    // echo '<br>';
    while (substr(abs($a), 0, 1) == 5 && abs($a) >= 50) {
      echo 'a ' . $a;
      echo '<br>';
      if ($i % 5 === 0 && ($i / 5) % 2 !== 0) {
        $counter--;
      }
      $counter++;
      $a = $a - round($a, 10 * (strlen($a) - 1));
      // echo 'aa ' . $a;
      // echo '<br>';
    }
    // echo 'su ' . substr($i, 1);
    // echo '<br>';
  }
  echo '<br>';
  echo $skirtumas;
  echo '<br>';
  echo $counter;
  echo '<br>';
  return $skirtumas - $counter;
}

echo '<br>';
echo dont_give_me_five(-60, 120);


echo '<br>';
echo '<br>';
echo substr(39207311414, 3, 2);
echo '<br>';
if (substr(39207311414, 3, 2) < 12) {
  echo 'Ok';
} else {
  echo 'Not ok';
}
$identityCode = 39207311465;
echo '<br>';

echo strlen(123456);
echo '<br>';

echo strval($identityCode)[0];
echo '<br>';

if (strval($identityCode)[0] == 3 || strval($identityCode)[0] == 4) {
  echo 'good';
} else {
  echo 'Bad';
}
echo '<br>';
echo '<br>';

$controlNumberCounter = 1;
$controlNumber = 0;
foreach (str_split($identityCode) as $key => $value) {
  if ($key !== 10) {
    if ($controlNumberCounter === 10) {
      $controlNumberCounter = 1;
    }
    echo '$controlNumberCounter ' . $controlNumberCounter;
    echo '<br>';
    $controlNumber += intval($value) * $controlNumberCounter;
    $controlNumberCounter++;
    echo '$controlNumber ' . $controlNumber;
    echo '<br>';
  }
}
echo '$controlNumber % 11 ' . $controlNumber % 11;
echo '<br>';
if ($controlNumber % 11 === 10) {
  // $controlNumber = 0;
  echo '$identityCode' . $identityCode;
  foreach (str_split($identityCode) as $key2 => $value2) {
    if ($key !== 10) {
      if ($controlNumberCounter === 10) {
        $controlNumberCounter = 1;
      }
      $controlNumber += intval($value2) * $controlNumberCounter;
      $controlNumberCounter++;
      echo '$controlNumber ' . $controlNumber;
      echo '<br>';
      echo '$controlNumberCounter ' . $controlNumberCounter;
      echo '<br>';
    }
  }
}

echo '<br>';
echo '<br>';
echo '$controlNumber ' . $controlNumber;
echo '<br>';
echo '$controlNumberCounter ' . $controlNumberCounter;
echo '<br>';

if ($controlNumber % 11 === 10) {
  $controlNumber = 0;
} else {
  $controlNumber = $controlNumber % 11;
}

echo $controlNumber;

echo '<br>';
echo substr($identityCode, -1);
