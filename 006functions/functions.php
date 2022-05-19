<a href="https://docs.google.com/document/d/1iWRalEudBx2RsZ8hlkw4Qz8BcFsnJEngogfika1f-2A/edit">Uzduociu nuoroda</a>
<h1> Uzduotis 1</h1>
<?php
function inH1($arg1, $arg2 = 1)
{
  echo "<h$arg2>";
  echo $arg1;
  echo "</h$arg2>";
}

inH1('Labas');

?>
<h1> Uzduotis 2</h1>
<?php
function inH1tag($arg1, $arg2)
{
  echo "<h$arg2>";
  echo $arg1;
  echo "</h$arg2>";
}

inH1tag('Viso gero', 2);
inH1('Viso gero', 3);

?>
<h1> Uzduotis 3</h1>
<?php

function putInH1($arg1)
{
  echo '<h1>';
  echo $arg1;
  echo '</h1>';
}
echo time();
echo '<br>';
echo md5(time());
echo '<br>';

$arr = str_split(md5(time()));
echo '<pre>';
print_r($arr);
echo '</pre>';
echo '<br>';
$numeric = '';
foreach ($arr as $value) {
  if (is_numeric($value)) {
    $numeric .= $value;
  } else {
    putInH1($numeric);
    $numeric = '';
  }
}
// ---------------------------
echo '---------------------------------';
echo '<pre>';
$stringas = md5(time());

// grazina raides, o viduj sudeda i masyva skaicius
$rez = preg_replace_callback(
  '/([0-9])([0-9]+)/',
  fn ($m) =>
  '<h2 style="display:inline; color:red">' . $m[2] . '</h2>' . '<h1 style="display:inline">' . $m[0] . '</h1>',
  $stringas
);

print_r($rez);

function h1($m)
{
  // foreach ($m as $value) {
  //   echo '<h1 style="display:inline">';
  //   echo $value;
  //   echo '</h1>';
  //   echo '<br>';
  // }

  print_r($m);
  // sudeti ir skaicius ir raides i viena eilute, pirmas skaicius h2 tage, like h1 tage
  return '<h2 style="display:inline; color:red">' . $m[2] . '</h2>' . '<h1 style="display:inline">' . $m[0] . '</h1>';
}


echo '</pre>';

?>
<h1> Uzduotis 4</h1>
<?php
function countDivisors($arg1)
{
  $divisorCount = 0;
  for ($i = 1; $i <= $arg1; $i++) {
    if ($arg1 % $i === 0) {
      $divisorCount++;
    }
  }
  return $divisorCount;
}
echo countDivisors(4156);

?>
<h1> Uzduotis 5</h1>
<?php
$arr = [];
for ($i = 0; $i < 100; $i++) {
  $arr[] = rand(33, 77);
}

foreach ($arr as $key1 => $value1) {
  foreach ($arr as $key2 => $value2) {
    if (countDivisors($arr[$key1]) < countDivisors($arr[$key2])) {
      $didesnis = $arr[$key2];
      $arr[$key2] = $arr[$key1];
      $arr[$key1] = $didesnis;
    }
  }
}

// echo '<pre>';
// print_r($arr);
// echo '</pre>';
$arr = array_reverse($arr);
foreach ($arr as $key => $value) {
  echo $value . ' ' . countDivisors($value) . '<br>';
}


?>
<h1> Uzduotis 6</h1>
<?php
$arr = [];
for ($i = 0; $i < 100; $i++) {
  $arr[$i] = rand(333, 777);
}
echo 'Pirminiai skaičiai: ';
$primeNumbers = [];
foreach ($arr as $value) {
  if (countDivisors($value) === 2) {
    $primeNumbers[] = $value;
  }
}
sort($primeNumbers);
echo '<pre>';
print_r($primeNumbers);
echo '</pre>';

?>
<h1> Uzduotis 7</h1>
<?php
$arr = [];
$counter = 1;
$depth = rand(10, 30);
// $depth = 3;
echo 'gylis ' . $depth;
echo '<br>';
function generateArr($arr, &$depth)
{
  static $counter = 1;
  $innerArr = [];
  $arrLength = rand(10, 20);
  for ($i = 0; $i < $arrLength; $i++) {
    if ($i === $arrLength - 1) {
      if ($counter < $depth) {
        $counter++;
        $arr[$i] = generateArr($innerArr, $depth);
      } else {
        $arr[$i] = 0;
      }
    } else {
      $arr[$i] = rand(0, 10);
    }
  }
  return $arr;
}

$arr = generateArr($arr, $depth);

echo '<pre>';
print_r($arr);
echo '</pre>';

?>
<h1> Uzduotis 8</h1>
<?php
$sum = 0;
$sum1 = 0;

function sumAllNumbers($array, &$sum, &$sum1)
{
  $sum1 += array_sum($array);
  foreach ($array as $value) {
    if (is_array($value)) {
      sumAllNumbers($value, $sum, $sum1);
    } else {
      $sum += $value;
    }
  }
}

sumAllNumbers($arr, $sum, $sum1);

echo $sum;
echo '<br>';
echo $sum1;
echo '<br>';

?>
<h1> Uzduotis 9</h1>
<?php
$arr = [];
function checkLast3Nums(&$array)
{
  $counter = 0;
  for ($i = count($array) - 1; $i >= count($array) - 3; $i--) {
    if (countDivisors($array[$i]) === 2) {
      $counter++;
    }
  }
  // echo 'counter ' . $counter;
  // echo '<br>';
  if ($counter !== 3) {
    addNum($array);
    checkLast3Nums($array);
  }
}

function addNum(&$array)
{
  $array[] = rand(1, 33);
}

for ($i = 0; $i < 3; $i++) {
  $arr[$i] = rand(1, 33);
}

checkLast3Nums($arr);

echo '<pre>';
print_r($arr);
echo '</pre>';

?>
<h1> Uzduotis 10</h1>
<?php
$arr = [];
for ($i = 0; $i < 10; $i++) {
  for ($ii = 0; $ii < 10; $ii++) {
    $arr[$i][$ii] = rand(1, 100);
  }
}
echo 'Pradinis masyvas: ';
echo '<pre>';
print_r($arr);
echo '</pre>';

function countPrimesSum(&$array)
{
  $sum = 0;
  $primeCounter = 0;
  $min = 100;
  foreach ($array as $inner) {
    if ($min > min($inner)) {
      $min = min($inner);
    }
    foreach ($inner as $value) {
      if (countDivisors($value) === 2) {
        $primeCounter++;
        $sum += $value;
      }
    }
  }
  // echo 'Pirminiu vidurkis ' . $sum / $primeCounter;
  // echo '<br>';
  // echo 'min ' . $min;
  // echo '<br>';
  if ($sum / $primeCounter < 70) {
    foreach ($array as &$inner) {
      if ($min === min($inner)) {
        $minIndex = array_search($min, $inner);
        $inner[$minIndex] += 3;
        break;
      }
    }
    unset($inner);
    countPrimesSum($array);
  }
}

countPrimesSum($arr);
// echo 'Pirminiai: ';
// echo '<br>';
foreach ($arr as $inner) {
  foreach ($inner as $value) {
    if (countDivisors($value) === 2) {
      echo $value;
      echo '<br>';
    }
  }
}

echo '<pre>';
print_r($arr);
echo '</pre>';

?>
<h1> Uzduotis 11</h1>
<?php
$arr = [];
$numCounter = 0;
$arrCounter = 0;
function generateArr2(&$array)
{
  $numCounter = 0;
  $arrCounter = 0;
  for ($i = 0; $i < rand(1, 5); $i++) {
    if ($numCounter - 1 === $arrCounter) {
      $array[$i] = rand(0, 100);
    } else {
      if (rand(0, 2) !== 0) {
        $array[$i] = rand(0, 100);
      } else {
        $array[$i] = [];
        generateArr2($array[$i]);
      }
    }
  }
}
$mainArrLength = rand(1, 100);
echo 'Main arr length: ' . $mainArrLength;
echo '<br>';
for ($i = 0; $i < $mainArrLength; $i++) {
  if ($numCounter - 1 === $arrCounter) {
    $arr[$i] = rand(0, 100);
  } else {
    if (rand(0, 2) !== 0) {
      $arr[$i] = rand(0, 100);
    } else {
      generateArr2($arr);
    }
  }
}

echo 'Masyvas turi ' . count($arr) . ' elementu';
$sum = 0;

$maxArrayDepth = 1;
$arrayDepth = 1;
function countArrSum($array, &$sum, &$maxArrayDepth, &$arrayDepth)
{
  // echo array_sum($array);
  // $sum += array_sum($array);
  foreach ($array as $value) {
    // echo $value;
    // echo '<br>';
    if (is_array($value)) {
      $arrayDepth++;
      // echo '<br>';
      // echo $arrayDepth;
      // echo '<br>';
      countArrSum($value, $sum, $maxArrayDepth, $arrayDepth);
    } else {
      $sum += $value;
    }
    if ($arrayDepth > $maxArrayDepth) {
      $maxArrayDepth = $arrayDepth;
    }
  }
  $arrayDepth -= 1;
}
countArrSum($arr, $sum, $maxArrayDepth, $arrayDepth);
$usedColors = [];
function showInDivs($array, &$usedColors)
{
  // static $usedColors = [];
  $color = rand(100000, 999999);
  while (in_array($color, $usedColors)) {
    $color = rand(100000, 999999);
  }
  array_push($usedColors, $color);
  echo "<div style='background-color:#$color;display:flex;padding:15px;flex-wrap:wrap;align-items:center;height:100%'>";
  foreach ($array as $value) {

    if (is_array($value)) {
      showInDivs($value, $usedColors);
    } else {
      echo $value . ', ';
    }
  }
  echo '</div>';
}




echo '<br>';
echo 'Masyvo elementu suma: ' . $sum;
echo '<br>';
echo 'Masyvo gylis: ' . $maxArrayDepth;
echo '<br>';

echo '<pre>';
print_r($arr);
echo '</pre>';


echo '<pre>';
echo '<div style="display:flex;">';
showInDivs($arr, $usedColors);
echo '</div>';

echo 'Color codes: ';
echo '<br>';
print_r($usedColors);
echo '</pre>';

?>