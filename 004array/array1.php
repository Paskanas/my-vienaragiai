<a href="https://docs.google.com/document/d/1itoAWI02qAu4HKw-3jRx8HApfjb1EdkdTZfTGgvibb4/edit">Uzduociu nuoroda</a>
<h1> Uzduotis 1</h1>
<?php
// $arr = array_fill(0, 29, rand(5, 25));
// foreach ($arr as $value) {
//   echo $value . ', ';
// }
// -----------------------------------------
// $arr1 = range(5, 25);
// $arr1 = array_merge($arr1, $arr1);
// shuffle($arr1);
// $arr1 = array_splice($arr1, 0, 29);
// foreach ($arr1 as $value) {
//   echo $value . ', ';
// }
// ----------------------------------
$arr2 = [];
for ($i = 0; $i < 30; $i++) {
  array_push($arr2, rand(5, 25));
}

$string = implode(', ', $arr2);
echo $string;

?>
<h1> Uzduotis 2</h1>
<?php
echo 'a.';
echo '<br>';
$counter10 = 0;
foreach ($arr2 as $key => $value) {
  // echo $key . ' ';
  // echo $value . ' ';
  if ($value > 10) {
    $counter10++;
  }
}
echo $counter10 . '<br>';
// ------------------------------------------
$arrFilter = array_filter($arr2, function ($value) {
  return $value > 10;
});
echo count($arrFilter) . '<br>';
echo 'b.';
echo '<br>';
$maxValue = max($arr2);
$arrMaxIndexes = [];
echo 'Max skaicius: ' . $maxValue;
echo '<br>';
// echo array_search($maxValue, $arr2);
// echo '<br>';
foreach ($arr2 as $key => $value) {
  if ($value === $maxValue) {
    array_push($arrMaxIndexes, $key);
  }
}
// print_r($arrMaxIndexes);
echo 'Max skaiciaus indeksai: ' . implode(', ', $arrMaxIndexes);
echo '<br>';

$arrayCountedValues = array_count_values($arr2);
echo 'Kiekis: ' . $arrayCountedValues[$maxValue];
echo '<br>';

// if (in_array($maxValue, $arr2)) {
//   echo 'yra';
// } else {
//   echo 'nera';
// }
// echo '<br>';
echo 'c.';
echo '<br>';
$sum = 0;
foreach ($arr2 as $key => $value) {
  if ($key % 2 === 0) {
    $sum += $value;
  }
}
echo "Lyginiu indeksu skaiciu suma: $sum";
echo '<br>';
echo 'd.';
echo '<br>';
$dArr = [];
foreach ($arr2 as $key => $value) {
  array_push($dArr, $value - $key);
}
echo implode(', ', $dArr);
echo '<br>';
echo 'e.';
echo '<br>';
while (max(array_keys($arr2)) < 39) {
  array_push($arr2, rand(5, 25));
}
echo 'Array: ' . implode(', ', $arr2);
echo '<br>';
echo 'Kiekis: ' . count($arr2);
echo '<br>';
echo 'f.';
echo '<br>';
$fArr1 = [];
$fArr2 = [];
foreach ($arr2 as $key => $value) {
  if ($key % 2 === 0) {
    array_push($fArr1, $value);
  } else {
    array_push($fArr2, $value);
  }
}
echo implode(', ', $fArr1);
echo '<br>';
echo implode(', ', $fArr2);
echo '<br>';
echo 'g.';
echo '<br>';
$gArr = [];
foreach ($arr2 as $key => $value) {
  if ($key % 2 === 0 && $value > 15) {
    array_push($gArr, 0);
  } else {
    array_push($gArr, $value);
  }
}
echo implode(', ', $gArr);
echo '<br>';
echo 'h.';
echo '<br>';
foreach ($arr2 as $key => $value) {
  if ($value > 10) {
    echo 'Indeksas: ' . $key;
    break;
  }
}
echo '<br>';
echo 'i.';
echo '<br>';
foreach ($arr2 as $key => $value) {
  if ($key % 2 === 0) {
    unset($arr2[$key]);
  }
}
echo implode(', ', $arr2);
echo '<br>';
// print_r($arr2);
// echo '<br>';

?>
<h1> Uzduotis 3</h1>
<?php
$letters = 'ABCD';
$arr = [];
for ($i = 0; $i <= 200; $i++) {
  array_push($arr, $letters[rand(0, 3)]);
}
echo implode(', ', $arr);
echo '<br>';
$countA = 0;
$countB = 0;
$countC = 0;
$countD = 0;
foreach ($arr as $key => $val1) {
  foreach (str_split($letters) as $val2) {
    if ($val1 === $val2) {
      if ($val1 === 'A') {
        $countA++;
      } elseif ($val1 === 'B') {
        $countB++;
      } elseif ($val1 === 'C') {
        $countC++;
      } elseif ($val1 === 'D') {
        $countD++;
      }
    }
  }
}
echo 'A: ', $countA . '<br>';
echo 'B: ', $countB . '<br>';
echo 'C: ', $countC . '<br>';
echo 'D: ', $countD . '<br>';


?>
<h1> Uzduotis 4</h1>
<?php
sort($arr);
echo implode(', ', $arr);
?>
<h1> Uzduotis 5</h1>
<?php
$letters = 'ABCD';
$arr1 = [];
for ($i = 0; $i <= 200; $i++) {
  array_push($arr1, $letters[rand(0, 3)]);
}
$arr2 = [];
for ($i = 0; $i <= 200; $i++) {
  array_push($arr2, $letters[rand(0, 3)]);
}
$arr3 = [];
for ($i = 0; $i <= 200; $i++) {
  array_push($arr3, $letters[rand(0, 3)]);
}
echo implode(', ', $arr1);
echo '<br>';
echo implode(', ', $arr2);
echo '<br>';
echo implode(', ', $arr3);
echo '<br>';
$arr4 = [];
for ($i = 0; $i <= 200; $i++) {
  array_push($arr4, $arr1[$i] . $arr2[$i] . $arr3[$i]);
}
$arrUnique = array_count_values($arr4);
echo '<br>';
echo implode(', ', array_keys($arrUnique));
echo '<br>';
foreach ($arrUnique as $key => $value) {
  if ($value === 1) {
    echo 'Unikalus:';
  }
  echo "$key: $value <br>";
}
echo 'Array counts sum ' . array_sum($arrUnique);
echo '<br>';
?>
<h1> Uzduotis 6</h1>
<?php
$arr1 = [];
$arr2 = [];
$rand = rand(100, 999);
for ($i = 0; $i < 100; $i++) {
  while (in_array($rand, $arr1)) {
    $rand = rand(100, 999);
  }
  array_push($arr1, rand(100, 999));
  $rand = rand(100, 999);
  while (in_array($rand, $arr2)) {
    $rand = rand(100, 999);
  }
  array_push($arr2, rand(100, 999));
}
echo implode(', ', $arr1);
echo '<br>';
echo '<br>';
echo implode(', ', $arr2);
echo '<br>';

?>
<h1> Uzduotis 7</h1>
<?php
$arrDiff = array_diff($arr1, $arr2);
echo implode(', ', $arrDiff);
echo '<br>';
?>
<h1> Uzduotis 8</h1>
<?php
$arrInter = array_intersect($arr1, $arr2);
echo implode(', ', $arrInter);
echo '<br>';
?>
<h1> Uzduotis 9</h1>
<?php
$arrComb = array_combine($arr1, $arr2);
print_r($arrComb);
?>
<h1> Uzduotis 10</h1>
<?php
$arr = [];
for ($i = 0; $i < 10; $i++) {
  if ($i < 2) {
    array_push($arr, rand(5, 25));
  } else {
    array_push($arr, $arr[$i - 2] + $arr[$i - 1]);
  }
}
echo implode(', ', $arr);
?>
<h1> Uzduotis 11</h1>
<?php
$arr = [];
for ($i = 0; $i < 101; $i++) {
  array_push($arr, rand(0, 300));
}
echo implode(', ', $arr);
echo '<br>';
$countValues = array_count_values($arr);
echo '<br>';
print_r($countValues);
echo '<br>';
for ($i = 0; $i < 101; $i++) {
  while ($countValues[$arr[$i]] !== 1) {
    $arr[$i] = rand(0, 300);
    $countValues = array_count_values($arr);
  }
}
$countValues = array_count_values($arr);
echo '<br>';
print_r(max($countValues));
echo '<br>';
echo '<br>';
echo implode(', ', $arr);
echo '<br>';
$arrSort = $arr;
sort($arrSort);
echo implode(', ', $arr);
echo '<br>';
echo implode(', ', $arrSort);
echo '<br>';
// echo count($arr);
// echo '<br>';
$counter = 0;
foreach ($arrSort as $key => $value) {
  if ($key % 2 === 0) {
    $arr[$counter] = $value;
    $counter++;
  } else {
    $arr[count($arr) - $counter] = $value;
  }
}
echo '<br>';
echo implode(', ', $arr);
echo '<br>';
$arrFirstPart = array_slice($arr, 0, 50);
$arrSecondPart = array_slice($arr, 51, count($arr) - 1);
echo implode(', ', $arrFirstPart);
echo '<br>';
echo implode(', ', $arrSecondPart);
echo '<br>';
// echo count($arrFirstPart);
// echo '<br>';
// echo count($arrSecondPart);
// echo '<br>';

echo 'Skirtumas: ' . abs(array_sum($arrFirstPart) - array_sum($arrSecondPart));
echo '<br>';
?>